<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <style>
        *,*::before,*::after{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            font-family: "Poppins",sans-serif;
            --main-color:  #009688;
            background-color: transparent;
        }
        a{
            text-decoration: none;
        }
        header{
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 4;
        }
        header .container{
            max-width: 82rem;
            margin: 0 auto;
            padding: 0 1rem;
            height: 65px;
            display: flex;
            align-items: flex-end;
        }
        header ul{
            display: flex;
            list-style: none;
            align-items: center;
        }
        .logo{
            display: flex;
            align-items: center;
            margin-right:3rem;

        }
        .logo .images{
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr;
        }
        .logo img{
            height: 35px;
            grid-column: 1/2;
            grid-row: 1/2;
            margin-right: 0.8rem;
        }
        .logo img.logo-forDark{
            opacity: 0;
        }
        .logo h2{
            color: #fff;
            font-size: 1.55rem;
            margin-top: 2px;
        }
        .nav-link{
            margin-left: 5.5rem;
            padding: 0 1rem;
            font-weight: 600;
            font-size: 1rem;
            color: #fff;
            transition: 0.3s;
        }
        .nav-link:hover{
            color: var(--main-color);
        }
        .nav-link.theme-toggle{
            cursor: pointer;
        }
        .theme-toggle .fa-sun{
            display: inline;
        }

        .contact{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 100vh; 
            padding: 1rem;
            box-sizing: border-box;

            background-image: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url(./img/background.jpg);

            background-size: cover;
            background-position: center; 
        }

        .contact .container {
            display: flex;
            flex-direction: column; 
            align-items: center;
            justify-content: center;
            max-width: 1200px;
            width: 100%;
        }
        
        .contact .container > div{
            grid-column:1/2 ;
            grid-row: 1/2;

        }
        .left{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            text-align: center; 
            padding: 2rem;
            box-sizing: border-box;
        }

        .contact-heading h1{
            font-weight: 600;
            color: #fff;
            font-size: 3.5rem;
            line-height: 0.9;
            white-space: nowrap;
            margin-bottom: 1.2rem;
            margin: 0;
        }
        .text{
            margin-top:27px ;
            color: #fff;
            line-height: 1.1;
            font-size: 1rem;
        }
        .text a{
            color: var(--main-color);
            transition: .3s;
        }
        .text a:hover{
            color: hsl(103, 100%, 26%);
            transition: .3s;
        }
        .input-wrap{
            position: relative;
        }
        .form-wrapper{
            max-width: 32rem;
        }
        .contact-form{
            display: grid;
            margin-top: 2.55rem;
            grid-template-columns:repeat(2,1fr);
            column-gap: 2rem;
            row-gap: 1rem;
        }
        .input-wrap.w-100{
            grid-column: span 2;
        }

        .contact-input{
            width: 100%;
            background-color:rgba(255, 255, 255, 0.1);
            padding: 1.5rem 1.35rem calc(0.75rem - 2px) 1.35rem;
            border: none;
            outline: none;
            font-family: inherit;
            border-radius:20px ;
            color: #fff;
            font-weight: 600;
            font-size:0.95rem;
            border: 2px solid transparent;
            box-shadow:  0 0 0 0px hsla (208, 92%, 54%, 0.169);
            transition: 0.3s;
        }
        .contact-input:hover{
            color: #fff;
        }

        .input-wrap label{
            position: absolute;
            top: 50%;
            left: calc(1.35rem + 2px);
            transform:translateY(-50%) ;
            color: rgba(255, 255, 255, 0.7);
            pointer-events: none;
            transition: .25s;
        }
        
        .input-wrap .icon{
            position: absolute;
            right: calc(1.35rem + 2px);
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.25rem;
            transition: .3s;
        }
        textarea.contact-input{
            resize: none;
            width: 100%;
            min-height: 150px;
        }
        textarea.contact-input ~ label{
            top: 1.2rem;
            transform: none;
        }
        textarea.contact-input ~ .icon{
            top: 1.3rem;
            transform: none;
        }

        .input-wrap.focus .contact-input{
            background-color:#fff ;
            border: 2px solid hsl(103, 100%, 26%);
            box-shadow:0 0 0 5px hsla(208, 91%, 55%, 0.11) ;
        }

        .input-wrap.focus label{
            color: var(--main-color);
        }

        .input-wrap.focus .icon{
            color: var(--main-color);
        }

        .input-wrap.not-empty label{
            font-size: .66rem;
            top: 0.75rem;
            transform: translateY(0);
        }

        .contact-buttons{
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 1rem;
            margin-top: 1rem;
            width: 100%;
            grid-column: span 2;
        }

        .btn{
            display: inline-block;
            padding: 1.1rem 2rem;
            background-color: var(--main-color);
            color: #fff;
            border-radius: 40px;
            border: none;
            font-family: inherit;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover{
            background-color: hsl(103, 100%, 26%);
        }

        .btn.upload{
            position: relative;
            background-color:rgba(255, 255, 255, 0.1);
        }
        .btn.upload span{
            background-color: rgba(255, 255, 255, 0.2);
        }

        .btn.upload input{
           position: absolute;
           width: 100%;
           height: 100%;
           top: 0;
           left: 0;
           background-color: red;
           cursor: pointer;
           opacity: 0;

        }
        .btn.upload:hover{
            background-color: rgba(255, 255, 255, 0.2);
        }

      @media(max-width: 1000px){
        .logo{
            margin-right: 1rem;
        }
        .logo img{
            height: 30px;
            margin-right:0.7rem; 
        }

        .logo h2{
            font-size: 1.3rem;
        }

        .nav-link{
            margin-left: 3.5rem;
            padding: 0 0.8rem;
            font-size: 0.9rem;
        }

        .nav-link.theme-toggle{
            font-size: 1rem;
        }

        .contact-heading h1{
            font-size: 2.5rem;
            margin-bottom: 1rem;
            white-space:normal;
        }

        .text{
            font-size: 0.9rem;
        }

        .contact-form{
            display: grid;
            margin-top: 1.9rem;
            column-gap: 0.8rem;
            row-gap: 0.65rem;
        }
        .contact-input{
            border-radius: 17px;
            font-size: 0.87rem;
            padding: 1.5rem 1.2rem calc(0.75rem - 2px) 1.2rem;
        }

        .input-wrap label{
            font-size: .91rem;
            left: calc(1.2rem + 2px);
        }
        .input-wrap .icon{
            font-size: 1.1rem;
            left: calc(1.2rem + 2px);
        }

        textarea.contact-input ~ label{
            top: 1.2rem;
        }
        textarea.contact-input ~ .icon{
            top: 1.33rem;
        }
        .input-wrap.focus .contact-input{
            box-shadow:0 0 0 3.5px #8c9aaf ;
        }

        .input-wrap.not-empty{
            font-size: 0.61rem;
        }
        .contact-buttons{
            column-gap: .8rem;
            margin-top: 0.45rem;
        }

        .btn{
            padding: 1rem 1.5rem;
            font-size: 0.87rem;
        }
      }


    </style>
</head>
<body>
    <header>

            
        <div class="container">
            <ul>
                <li>
                    <a href="main.php" class="logo">
                        <div class="images">
                        <img src="./img/logo.png" class="logo-forLight" alt="Publius">
                        </div>
                        <h2>ProRealEstate.</h2>
                    </a>
                </li>
                <li>
                    <a href="main.php" class="nav-link">Home</a>
                </li>
                <li>
                    <a href="#" class="nav-link">Join</a>
                </li>
                <li>
                    <span class="nav-link theme-toggle">
                        <i class="fa-solid fa-sun"></i>
                    </span>
                </li>
            </ul>
        </div>
    </header>
    <main>
        <section class="contact">
            <div class="container">
                <div class="left">
                    <div class="form-wrapper">
                        <div class="contact-heading">
                            <h1>Find your home.</h1>
                            <p class="text">Or reach us via : <a href="gmail">ProRealEstate@gmail.com</a></p>
                        </div>

                        <form action="index.html" method="post" class="contact-form">
                            <div class="input-wrap">
                                <input class="contact-input" autocomplete="off" name="First Name"
                                 type="text" required>
                                 <label>First Name</label>
                                 <i class="icon fa-solid fa-address-card"></i>
                            </div>

                            <div class="input-wrap">
                                <input class="contact-input" autocomplete="off" name="Last Name"
                                 type="text" required>
                                 <label>Last Name</label>
                                 <i class="icon fa-solid fa-address-card"></i>
                            </div>

                            <div class="input-wrap w-100">
                                <input class="contact-input" autocomplete="off" name="Email"
                                 type="email" required>
                                 <label>Email</label>
                                 <i class="icon fa-solid fa-envelope"></i>
                            </div>
                            <div class="input-wrap textarea w-100">
                               <textarea name="Message" autocomplete="off" 
                               class="contact-input" required></textarea>
                                 <label>Message</label>
                                 <i class="icon fa-solid fa-inbox"></i>
                            </div>
                            <div class="contact-buttons">
                                <button class="btn upload">
                                    <span>
                                        <i class="fa-solid fa-paperclip"></i>Add attachment
                                    </span>
                                    <input type="file" name="attachment">
                                </button>
                                <input type="submit" value="Send message" class="btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>