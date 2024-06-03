<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="https://www.zarla.com/images/zarla-construye-fcil-1x1-2400x2400-20220117-6yc9y3tj8fp769frrfbx.png?crop=1:1,smart&width=250&dpr=2" type="">

    <!-- Styles -->

</head>

<body style=" transition: background-color 0.5s ease;">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
        style=" width:100%;display:flex;justify-content: flex-end">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"
                style="width:20%;display:flex;justify-content:space-around;font-family:arial;">
                @auth
                    <a href="{{ url('/home') }}"
                        class="font-family: 'Akronim', display; text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-family: 'Akronim', display; text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        style="text-decoration:none;font-weight:700;font-size:20px;background-color:#dc3545;padding:10px 20px;border-radius:20px;color:white;">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            style="font-family: 'Akronim', display; text-decoration:none;font-weight:700;font-size:20px;background-color:#dc3545;padding:10px 20px;border-radius:20px;color:white;">Register</a>
                    @endif
                @endauth
            </div>
        @endif 
    </div>
    <div style="width:100%;display:flex;font-family:arial;">
        <div style="width:100%;text-align:center;">
            <div style="width: 100%;">
                <p style="text-align:center; font-family: 'Akronim', display; color:rgb(0, 0, 0);  font-size: 3em; 
                font-weight: bold;">Welcome to Construye Fácil</p>
                <div class="w-50 mx-auto">
				    <div class="d-flex justify-content-center">
								<img src="https://www.zarla.com/images/zarla-construye-fcil-1x1-2400x2400-20220117-6yc9y3tj8fp769frrfbx.png?crop=1:1,smart&width=250&dpr=2"
									alt="" style="width:30%;">
				    </div>
			    </div>
            </div>
            
            
            <div style="color: rgb(0, 0, 0); font-family:'Akronim', display;; width:60%; font-size: 1.7em; line-height:1.5em; justify-content:center; margin-bottom:20px;  margin-left:20%;  margin-right:20%; text-align: center; ">
                At Construye Fácil, we are your reliable partner for all your construction, remodeling and repair projects. Con años de experiencia en el sector, ofrecemos una amplia gama de productos de alta calidad, desde herramientas y materiales de construcción hasta soluciones innovadoras para el hogar y la industria. <br> <br>
                   
                Visítenos hoy mismo y descubra por qué Construye Fácil es la opción preferida de constructores, contratistas y propietarios de viviendas por igual. Estamos aquí para hacer que su experiencia de compra sea sencilla y satisfactoria: ¡construyamos juntos el futuro de forma fácil y eficiente! <br><br>
                            <span><strong> Construye Fácil, you will find:</strong> <br>
                                <li><strong>Building materials</strong> for any project, large or small.
                                <img src="https://d100mj7v0l85u5.cloudfront.net/s3fs-public/2023-09/materiales-para-la-construccion.png" width="60%" alt="">    
                                <li><strong>for any project, large or small.</strong> reliable for professionals and DIY enthusiasts.</li>
                                <img src="https://maluma.com.co/wp-content/uploads/2013/06/productos-ferreteria.jpg" width="60%" alt="">   
                                <li><strong>Expert advice</strong> to help you make the best decisions and get the best results.</li>
                                <img src="https://tytenlinea.com/wp-content/uploads/2021/07/IMG_8656-scaled-e1628001333278.jpeg" width="60%" alt="">   
                                <li><strong>Competitive pricing</strong> and exclusive promotions that will allow you to save without sacrificing quality.</li>
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKFsORYXcnJVL1In8Vn7_1_PSshN_iatvGwA&s" width="60%" alt="">   
                            </span>
                      
                        <br> <br>
                        Visit us today and find out why Construye Fácil is the preferred choice of builders, contractors and homeowners alike. We're here to make your buying experience simple and satisfying - let's build the future together, easily and efficiently!
                
            </div>
        </div>
     
    </div>
    <div style="width:100%;font-family:arial;">
        <div style="width:100%;text-align:center;">
            <br><br>
        <a href=""
        class="font-family: 'Akronim', display; text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        style="text-decoration:none;font-weight:700;font-size:20px;background-color:#dc3545;padding:10px 20px;border-radius:20px;color:white;"> Shop
        Now</a>
        </div>
    </div>
    
</body>

</html>