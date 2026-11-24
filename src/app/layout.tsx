import type { Metadata } from "next";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import TemplateScripts from "@/components/TemplateScripts";

export const metadata: Metadata = {
    title: "Urane - Insurance Company HTML Template",
    description: "Urane - Insurance Company HTML Template",
    icons: {
        icon: "/assets/img/favicon.png",
    },
};

export default function RootLayout({
    children,
}: Readonly<{
    children: React.ReactNode;
}>) {
    return (
        <html lang="id">
            <head>
                <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
                <link rel="stylesheet" href="/assets/css/font-awesome.min.css" />
                <link rel="stylesheet" href="/assets/css/magnific-popup.css" />
                <link rel="stylesheet" href="/assets/css/swiper-bundle.min.css" />
                <link rel="stylesheet" href="/assets/css/animate.min.css" />
                <link rel="stylesheet" href="/assets/css/validnavs.css" />
                <link rel="stylesheet" href="/assets/css/helper.css" />
                <link rel="stylesheet" href="/assets/css/unit-test.css" />
                <link rel="stylesheet" href="/assets/css/style.css" />
            </head>
            <body>
                <Header />

                <main>
                    {children}
                </main>

                <Footer />
                <TemplateScripts />
            </body>
        </html>
    );
}