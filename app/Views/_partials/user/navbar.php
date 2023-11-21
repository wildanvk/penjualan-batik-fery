<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">Toko Batik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <!-- <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/">All Products</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="/">Popular Items</a></li>
                        <li><a class="dropdown-item" href="/">New Arrivals</a></li>
                    </ul>
                </li> -->
            </ul>

            <?php if (session()->get('user_logged_in')) { ?>
            <div class="d-flex mx-2">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Transaksi
                </button>
            </div>
            <div class="d-flex mx-1">
                <a href="/user/logout" class="btn btn-danger" type="submit">
                    <i class="bi bi-box-arrow-in-left me-1"></i>
                    Logout
                </a>
            </div>
            <?php } ?>
            <?php if (!session()->get('user_logged_in')) { ?>
            <div class="d-flex mx-1">
                <a href="/user/register" class="btn btn-outline-success" type="submit">
                    <i class="bi bi-pencil-square me-1"></i>
                    Register
                </a>
            </div>
            <div class="d-flex mx-1">
                <a href="/user/login" class="btn btn-primary" type="submit">
                    <i class="bi bi-box-arrow-in-right me-1"></i>
                    Login
                </a>
            </div>
            <span> |</span>
            <div class="d-flex mx-1">
                <a href="/auth" class="btn btn-primary" type="submit">
                    <i class="bi bi-trello me-1"></i>
                    Admin Area
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</nav>