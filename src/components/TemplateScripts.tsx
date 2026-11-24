"use client";

import { useEffect } from "react";

const scripts = [
    "jquery-3.6.0.min.js",
    "bootstrap.bundle.min.js",
    "jquery.appear.js",
    "swiper-bundle.min.js",
    "progress-bar.min.js",
    "isotope.pkgd.min.js",
    "imagesloaded.pkgd.min.js",
    "magnific-popup.min.js",
    "count-to.js",
    "jquery.nice-select.min.js",
    "jquery.scrolla.min.js",
    "YTPlayer.min.js",
    "validnavs.js",
    "gsap.js",
    "ScrollTrigger.min.js",
    "rangeSlider.min.js",
    "jquery-ui.min.js",
    "main.js",
];

let scriptsLoading: Promise<void> | undefined;

function loadTemplateScripts() {
    if (!scriptsLoading) {
        scriptsLoading = scripts.reduce(
            (previousScript, file) =>
                previousScript.then(
                    () =>
                        new Promise<void>((resolve, reject) => {
                            const script = document.createElement("script");
                            script.src = `/assets/js/${file}`;
                            script.async = false;
                            script.onload = () => resolve();
                            script.onerror = () =>
                                reject(new Error(`Failed to load template script: ${script.src}`));
                            document.body.appendChild(script);
                        }),
                ),
            Promise.resolve(),
        );
    }

    return scriptsLoading;
}

export default function TemplateScripts() {
    useEffect(() => {
        loadTemplateScripts().catch((error: unknown) => {
            console.error("Template scripts could not be initialized.", error);
        });
    }, []);

    return null;
}