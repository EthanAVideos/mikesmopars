document.addEventListener("DOMContentLoaded", async () => {
    // Domains to manually check
    const domain = window.location.hostname;

    // Multiple fallback URLs — as many as you want
    const authSources = [
        "https://raw.githubusercontent.com/EthanAVideos/EthanA-Videos-Authentication/refs/heads/main/auth.json"
    ];

    let authData = null;

    // Try loading each auth.json until one works
    for (const url of authSources) {
        try {
            const res = await fetch(url, { cache: "no-store" });
            if (!res.ok) continue;

            const json = await res.json();
            authData = json;
            break; // success → stop trying others
        } catch (e) {
            continue;
        }
    }

    // If NO auth.json was loaded → do NOT block anything
    if (!authData) {
        console.warn("Could not load ANY auth.json — authentication bypassed.");
        return;
    }

    // --- WEBSITE BLOCKING CHECK ---
    const siteEntry = authData.sites?.[domain];
    if (siteEntry && siteEntry.value === "0") {
        blockEntireSite();
        return; // do NOT continue to services
    }

    // --- SERVICE-LEVEL CHECKS ---
    applyServiceRestrictions(authData, domain);



    // ------------------------
    // FUNCTIONS
    // ------------------------

    function blockEntireSite() {
        document.body.innerHTML = `
        <div style="
        padding:20px;
        font-family: Arial, sans-serif;
        color: red;
        text-align: center;
        font-size: 22px;
        margin-top: 40px;
        ">
        <b>EAV Authentication Failed!</b><br><br>
        This site is disabled or not authorized under EAV Auth.
        </div>
        <center>
        <div style=" background-color: gray; width: 100%; height: 35px; position: fixed; left: 0; bottom: 0; ">
        <a href="https://github.com/EthanAVideos/EthanA-Videos-Authentication/blob/main/README.md">Learn why you can't access this page</a>
        </div>
        </center>
        `;
    }

    function applyServiceRestrictions(data, domain) {
        const serviceMap = data.serviceIdenifier || {};
        const svcConfig = data.services?.[domain];

        if (!svcConfig) return;

        const domainValue = svcConfig.value === "1";   // 1 = allowed, 0 = block ALL services
        const allowedServices = svcConfig.service || [];
        const reasonText = svcConfig.reason || "Service disabled on this site.";

        for (const selector in serviceMap) {
            const serviceName = serviceMap[selector];

            // Determine if this service is allowed
            const allowed = domainValue && allowedServices.includes(serviceName);

            if (allowed) continue;

            // Block this service
            const elements = document.querySelectorAll(selector);

            elements.forEach(el => {
                el.style.display = "none";

                const warn = document.createElement("div");
                warn.style.cssText = `
                color: red;
                font-size: 14px;
                margin: 6px 0;
                padding: 6px;
                border-left: 3px solid red;
                background: #ffe6e6;
                font-family: Arial, sans-serif;
                `;
                warn.innerHTML = `
                <b>Service: ${serviceName} blocked</b><br>
                ${reasonText}
                `;

                el.insertAdjacentElement("afterend", warn);
            });
        }
    }
});
