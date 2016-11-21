<html>
    <head>
    <!-- 
        
        This is a main template 
        @author : Dirham
        @mail   : dirhamsistem@gmail.com
        
     -->
        <title>AddressBook - By Dirham</title>
        <base href="localhost/address">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css">
        <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">        
        <script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
    </head>

    <body style="margin: 10px;">
        <header class="container">

            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#tg">
                        <span class="sr-only">Testing</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://localhost/address/">Address</a>
                </div>
                <div class="collapse navbar-collapse"
                 id="tg">
                    <ul class="nav navbar-nav">
                        <li><a href="http://localhost/address">Home</a></li>
                        <li><a href="http://localhost/address/Home/about">About</a></li>
                            <ul class="dropdown-menu">
                                <li><a href="#">Articles</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="container">
            <!-- 
                get content from controller 
             -->
             <!-- <?=$content;?> -->
            <?php include($content) ?>
        </div>
       <div class="col-md-12 text-center">
       <div id="footer">
          <div class="container text-center">
            <footer class="navbar navbar-inverse">
                <p style="padding: 20px; color: white;">I'm Dirham Fb : <a href="https://www.facebook.com/draf.dirham">Facebook </a>~ My Repository : <a href="https://github.com/dirham">Github</a> ~ Resume : <a href="https://id.linkedin.com/in/dirham-draf-502991b3">Linkedin</a></p>
            </footer>
          </div>
       </div>
       </div>
       
       <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
    </body>
</html>
