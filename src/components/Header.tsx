import Link from "next/link";
import Image from "next/image";

export default function Header() {
    return (
        <>
            {/* Top Bar Area */}
            <div className="top-bar-area top-bar-style-one bg-dark text-light">
                <div className="container">
                    <div className="row align-center">
                        <div className="col-lg-7">
                            <ul className="item-flex">
                                <li>
                                    <i className="fas fa-map-marker-alt"></i> California, TX 70240E
                                </li>
                                <li>
                                    <i className="fas fa-clock"></i> Opening Hours: 10:00am - 07:00pm
                                </li>
                            </ul>
                        </div>
                        <div className="col-lg-5 text-end">
                            <div className="item-flex">
                                <div className="dropdown">
                                    <button className="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="/assets/img/icon/12.png" alt="Language Icon" />
                                        English <i className="fas fa-angle-down"></i>
                                    </button>
                                    <ul className="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a className="dropdown-item" href="#">Spanish</a></li>
                                        <li><a className="dropdown-item" href="#">Arabic</a></li>
                                    </ul>
                                </div>
                                <div className="social">
                                    <ul>
                                        <li>
                                            <a href="#"><i className="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i className="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i className="fab fa-youtube"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i className="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {/* End Top Bar Area */}

            {/* Top Header */}
            <div className="top-header-style-one">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-12">
                            <div className="top-header-items">
                                <div className="logo">
                                    <Link href="/">
                                        <Image src="/assets/img/logo.png" alt="Company Logo" width={200} height={50} style={{ width: "auto", height: "62px" }} />
                                    </Link>
                                </div>
                                <ul className="top-header-list">
                                    <li>
                                        <div className="icon">
                                            <i className="fas fa-phone"></i>
                                        </div>
                                        <div className="info">
                                            <p>Call Us Any Time:</p>
                                            <h5><a href="tel:+4733378901">+163-2654-3654</a></h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div className="icon">
                                            <i className="fas fa-comments-alt"></i>
                                        </div>
                                        <div className="info">
                                            <p>Email Us: </p>
                                            <h5><a href="mailto:someone@example.com">info@insurance.com</a></h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {/* End Top Header */}

            {/* Header and Navigation */}
            <header>
        {/* Start Navigation */}
        <nav className="navbar mobile-sidenav navbar-sticky box-style-one navbar-box logo-less validnavs">

            {/* Start Top Search */}
            <div className="top-search">
                <div className="container-xl">
                    <div className="input-group">
                        <span className="input-group-addon"><i className="fa fa-search"></i></span>
                        <input type="text" className="form-control" placeholder="Search" />
                        <span className="input-group-addon close-search"><i className="fa fa-times"></i></span>
                    </div>
                </div>
            </div>
            {/* End Top Search */}

            <div className="container nav-box d-flex justify-content-between align-items-center">            

                {/* Start Header Navigation */}
                <div className="navbar-header">
                    <button type="button" className="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i className="fa fa-bars"></i>
                    </button>
                    <a className="navbar-brand" href="index.html">
                        <img src="assets/img/logo.png" className="logo logo-display" alt="Logo" />
                        <img src="assets/img/logo-light.png" className="logo logo-scrolled" alt="Logo" />
                    </a>
                </div>
                {/* End Header Navigation */}

                {/* Collect the nav links, forms, and other content for toggling */}
                <div className="collapse navbar-collapse" id="navbar-menu">

                    <img src="assets/img/logo-2.png" alt="Logo" />
                    <button type="button" className="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i className="fa fa-times"></i>
                    </button>
                    
                    <ul className="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li className="dropdown megamenu-fw megamenu-style-one">
                            <a href="#" className="dropdown-toggle" data-toggle="dropdown">Home</a>
                            <ul className="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div className="col-menu-wrap">
                                        <div className="col-item">
                                            <div className="menu-thumb">
                                                <img src="assets/img/demo/home-1.jpg" alt="Image Not Found" />
                                                <div className="overlay">
                                                    <a href="index.html">Multipage</a>
                                                    <a href="index-dark.html">Dark Home</a>
                                                    <a href="index-op.html">One Page</a>
                                                </div>
                                            </div>
                                            <h6 className="title"><a href="index.html">Home Version One</a></h6>
                                        </div>
                                        <div className="col-item">
                                            <div className="menu-thumb">
                                                <img src="assets/img/demo/home-2.jpg" alt="Image Not Found" />
                                                <div className="overlay">
                                                    <a href="index-2.html">Multipage</a>
                                                    <a href="index-2-dark.html">Dark Home</a>
                                                    <a href="index-2-op.html">One Page</a>
                                                </div>
                                            </div>
                                            <h6 className="title"><a href="index-2.html">Home Version Two</a></h6>
                                        </div>
                                        <div className="col-item">
                                            <div className="menu-thumb">
                                                <img src="assets/img/demo/home-3.jpg" alt="Image Not Found" />
                                                <div className="overlay">
                                                    <a href="index-3.html">Multipage</a>
                                                    <a href="index-3-dark.html">Dark Home</a>
                                                    <a href="index-3-op.html">One Page</a>
                                                </div>
                                            </div>
                                            <h6 className="title"><a href="index-3.html">Home Version Three</a></h6>
                                        </div>
                                        <div className="col-item">
                                            <div className="menu-thumb">
                                                <img src="assets/img/demo/home-4.jpg" alt="Image Not Found" />
                                                <div className="overlay">
                                                    <a href="index-4.html">Multipage</a>
                                                    <a href="index-4-dark.html">Dark Home</a>
                                                    <a href="index-4-op.html">One Page</a>
                                                </div>
                                            </div>
                                            <h6 className="title"><a href="index-4.html">Home Version Four</a></h6>
                                        </div>
                                        <div className="col-item">
                                            <div className="menu-thumb">
                                                <img src="assets/img/demo/home-5.jpg" alt="Image Not Found" />
                                                <div className="overlay">
                                                    <a href="index-5.html">Multipage</a>
                                                    <a href="index-5-dark.html">Dark Home</a>
                                                    <a href="index-5-op.html">One Page</a>
                                                </div>
                                            </div>
                                            <h6 className="title"><a href="index-5.html">Home Version Five</a></h6>
                                        </div>
                                        <div className="col-item">
                                            <div className="menu-thumb">
                                                <img src="assets/img/demo/home-6.jpg" alt="Image Not Found" />
                                                <div className="overlay">
                                                    <a href="index-6.html">Multipage</a>
                                                    <a href="index-6-dark.html">Dark Home</a>
                                                    <a href="index-6-op.html">One Page</a>
                                                </div>
                                            </div>
                                            <h6 className="title"><a href="index-6.html">Home Version Six</a></h6>
                                        </div>
                                        
                                    </div>
                                    <div className="megamenu-banner">
                                        <img src="assets/img/demo/banner.jpg" alt="Image Not Found" />
                                        <a href="https://www.youtube.com/watch?v=aTC_RNYtEb0" className="popup-youtube video-play-button"><i className="fas fa-play"></i></a>
                                        <h6 className="title"><a href="#">Watch Intro Video</a></h6>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li className="dropdown">
                            <a href="#" className="dropdown-toggle" data-toggle="dropdown" >Pages</a>
                            <ul className="dropdown-menu">
                                <li><a href="about-us.html">About Us</a></li>
                                <li className="dropdown">
                                    <a href="#" className="dropdown-toggle" data-toggle="dropdown" >Team</a>
                                    <ul className="dropdown-menu">
                                        <li><a href="team.html">Team Style One</a></li>
                                        <li><a href="team-2.html">Team Style Two</a></li>
                                        <li><a href="team-details.html">Team Details</a></li>
                                    </ul>
                                </li>
                                <li className="dropdown">
                                    <a href="#" className="dropdown-toggle" data-toggle="dropdown" >Pricing</a>
                                    <ul className="dropdown-menu">
                                        <li><a href="pricing.html">Pricing Style One</a></li>
                                        <li><a href="pricing-2.html">Pricing Style Two</a></li>
                                    </ul>
                                </li>
                                <li className="dropdown">
                                    <a href="#" className="dropdown-toggle" data-toggle="dropdown" >Gallery</a>
                                    <ul className="dropdown-menu">
                                        <li><a href="gallery.html">Gallery Style One</a></li>
                                        <li><a href="gallery-details.html">Gallery Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="faq.html">Faq</a></li>
                                <li className="dropdown">
                                    <a href="#" className="dropdown-toggle" data-toggle="dropdown" >Testimonials</a>
                                    <ul className="dropdown-menu">
                                        <li><a href="testimoinials.html">Testimonial Style One</a></li>
                                        <li><a href="testimoinials-2.html">Testimonial Style Two</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="404.html">Error Page</a></li>
                            </ul>
                        </li>
                        <li className="dropdown">
                            <a href="#" className="dropdown-toggle" data-toggle="dropdown" >Insurance</a>
                            <ul className="dropdown-menu">
                                <li><a href="insurance.html">Insurance Style One</a></li>
                                <li><a href="insurance-2.html">Insurance Style Two</a></li>
                                <li><a href="insurance-3.html">Insurance Style Three</a></li>
                                <li><a href="insurance-4.html">Insurance Style Four</a></li>
                                <li><a href="insurance-details.html">Life Insurance</a></li>
                                <li><a href="insurance-details.html">Home Insurance</a></li>
                                <li><a href="insurance-details.html">Car Insurance</a></li>
                                <li><a href="insurance-details.html">Health Insurance</a></li>
                                <li><a href="insurance-details.html">Travel Insurance</a></li>
                                <li><a href="insurance-details.html">Marrige Insurance</a></li>
                                <li><a href="insurance-details.html">Business Insurance</a></li>
                            </ul>
                        </li>
                        <li className="dropdown">
                            <a href="#" className="dropdown-toggle" data-toggle="dropdown" >Blog</a>
                            <ul className="dropdown-menu">
                                <li><a href="blog-standard.html">Blog Standard</a></li>
                                <li><a href="blog-with-sidebar.html">Blog With Sidebar</a></li>
                                <li><a href="blog-2-colum.html">Blog Grid Two Colum</a></li>
                                <li><a href="blog-3-colum.html">Blog Grid Three Colum</a></li>
                                <li><a href="blog-single.html">Blog Single</a></li>
                                <li><a href="blog-single-with-sidebar.html">Blog Single With Sidebar</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>{/* /.navbar-collapse */}

                <div className="attr-right">
                    {/* Start Atribute Navigation */}
                    <div className="attr-nav attr-box">
                        <ul>
                            <li className="search"><a href="#"><i className="far fa-search"></i></a></li>
                            <li className="side-menu">
                            <a href="#">
                                <span className="bar-1"></span>
                                <span className="bar-2"></span>
                                <span className="bar-3"></span>
                            </a>
                        </li>
                        </ul>
                    </div>
                    {/* End Atribute Navigation */}
                </div>

                {/* Start Side Menu */}
                <div className="side">
                    <a href="#" className="close-side"><i className="fas fa-times"></i></a>
                    <div className="widget">
                        <div className="logo">
                            <img src="assets/img/logo-light.png" alt="Logo" />
                        </div>
                        <p>
                            Arrived compass prepare an on as. Reasonable particular on my it in sympathize. Size now easy eat hand how. Unwilling he departure elsewhere dejection at. Heart large seems may purse means few blind.
                        </p>
                    </div>
                    <div className="widget address">
                        <div>
                            <ul>
                                <li>
                                    <div className="content">
                                        <p>Address</p> 
                                        <strong>California, TX 70240</strong>
                                    </div>
                                </li>
                                <li>
                                    <div className="content">
                                        <p>Email</p> 
                                        <strong>support@validtheme.com</strong>
                                    </div>
                                </li>
                                <li>
                                    <div className="content">
                                        <p>Contact</p> 
                                        <strong>+44-20-7328-4499</strong>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div className="widget newsletter">
                        <h4 className="title">Get Subscribed!</h4>
                        <form action="#">
                            <div className="input-group stylish-input-group">
                                <input type="email" placeholder="Enter your e-mail" className="form-control" name="email" />
                                <span className="input-group-addon">
                                    <button type="submit">
                                        <i className="fas fa-arrow-right"></i>
                                    </button>  
                                </span>
                            </div>
                        </form>
                    </div>
                    <div className="widget social">
                        <ul className="link">
                            <li><a href="#"><i className="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i className="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i className="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i className="fab fa-behance"></i></a></li>
                        </ul>
                    </div>

                </div>
                {/* End Side Menu */}

            </div>   
            {/* Overlay screen for menu */}
            <div className="overlay-screen"></div>
            {/* End Overlay screen for menu */}

        </nav>
        {/* End Navigation */}
    </header>
        </>
    );
}