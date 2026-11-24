"use client";

import { useEffect, useState } from "react";

export default function Footer() {
    const [year, setYear] = useState<number | null>(null);

    useEffect(() => {
        setYear(new Date().getFullYear());
    }, []);

    return (
        <footer className="footer">
            <div className="container">
                <div className="footer-content">
                    <div className="footer-logo">
                        <img
                            src="/assets/img/logo.png"
                            alt="Company Logo"
                            width={120}
                            height={30}
                            style={{ objectFit: "contain" }}
                        />
                    </div>
                    <div className="footer-links">
                        <a href="/">Home</a>
                        <a href="/about">About</a>
                        <a href="/services">Services</a>
                        <a href="/contact">Contact</a>
                    </div>
                    <div className="footer-info">
                        <p>&copy; {year ?? ""} Company Name. All rights reserved.</p>
                    </div>
                </div>
            </div>
            <style jsx>{`
                .footer {
                    background: #222;
                    color: #fff;
                    padding: 32px 0 16px 0;
                    font-size: 0.9rem;
                }
                .container {
                    max-width: 1200px;
                    margin: 0 auto;
                    padding: 0 20px;
                }
                .footer-content {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    gap: 20px;
                }
                .footer-logo img {
                    display: block;
                }
                .footer-links {
                    display: flex;
                    gap: 24px;
                }
                .footer-links a {
                    color: #fff;
                    text-decoration: none;
                    transition: color 0.2s;
                }
                .footer-links a:hover {
                    color: #ffae00;
                }
                .footer-info {
                    margin-top: 10px;
                    font-size: 0.85rem;
                    opacity: 0.75;
                }

                @media (min-width: 600px) {
                    .footer-content {
                        flex-direction: row;
                        justify-content: space-between;
                        align-items: center;
                    }
                    .footer-info {
                        margin-top: 0;
                    }
                }
            `}</style>
        </footer>
    );
}