<nav class="main-menu">
        <div class="scrollbar" id="style-1">
            <ul class="menu-list" style="color:black">
                <li>
                    <a href="{{ route('admin.home') }}">
                        <i class="fa fa-home fa-lg"></i>
                        <span class="nav-text">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.banner.list') }}">
                        <i class="fa fa-bullhorn fa-lg"></i>
                        <span class="nav-text">Banner</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.brand.list') }}">
                        <i class="fa fa-bullhorn fa-lg"></i>
                        <span class="nav-text">Brand</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.list') }}">
                        <i class="fa fa-tags fa-lg"></i>
                        <span class="nav-text">Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.product.list') }}">
                        <i class="fa fa-shopping-bag fa-lg"></i> 
                        <span class="nav-text">Sản Phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="/cart">
                        <i class="fa fa-shopping-cart fa-lg"></i> 
                        <span class="nav-text">Giỏ Hàng</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.contact.list') }}">
                        <i class="fa fa-phone fa-lg"></i> 
                        <span class="nav-text">Liên Hệ</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('admin.custom_user.list') }}">
                        <i class="fa fa-user fa-lg"></i>
                        <span class="nav-text">user</span>
                    </a>
                </li>
                <li>
                    <a href="£st}">
                        <i class="fa fa-user fa-lg"></i>
                        <span class="nav-text">Account</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
<style>
@import url('https://fonts.googleapis.com/css?family=Titillium+Web:300');

body
{
    margin:0px;
    padding:0px;
	font-family: "Open Sans", arial;
	background:url('https://static.tumblr.com/94eb957a00fd03c0c2f7d26decd71578/u1rhacw/osAmyyh1q/tumblr_static_tumblr_static_gaussian_blur_gradient_desktop_1680x943_wallpaper-393751.jpg');
	color:#fff;
	font-weight:300;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}


/* @import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css); */



.content {
            flex: 1;
        }
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        .footer a {
            color: #ffcc00;
            text-decoration: none;
        }
.settings {
  
    height:73px; 
    float:left;
    background-repeat:no-repeat;
    width:250px;
    margin:0px;
    text-align: center;
    font-size:40px;
    font-family: 'Strait', sans-serif;

}






/* ScrolBar  */
.scrollbar
{

height: 90%;
width: 100%;
overflow-y: hidden;
overflow-x: hidden;
}

.scrollbar:hover
{

height: 90%;
width: 100%;
overflow-y: scroll;
overflow-x: hidden;
}

/* Scrollbar Style */ 



#style-1::-webkit-scrollbar-track
{
border-radius: 2px;
}

#style-1::-webkit-scrollbar
{
width: 5px;
background-color: #F7F7F7;
}

#style-1::-webkit-scrollbar-thumb
{
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
background-color: #BFBFBF;
}
/* Scrollbar End */ 




.fa-lg {
font-size: 1em;
  
}
.fa {
position: relative;
display: table-cell;
width: 55px;
height: 36px;
text-align: center;
top:12px; 
font-size:20px;

}



.main-menu:hover, nav.main-menu.expanded {
width:250px;
overflow:hidden;
opacity:1;

}

.main-menu {
background:#F7F7F7;
position:absolute;
top:0;
bottom:0;
height:100%;
left:0;
width:55px;
overflow:hidden;
-webkit-transition:width .2s linear;
transition:width .2s linear;
-webkit-transform:translateZ(0) scale(1,1);
box-shadow: 1px 0 15px rgba(0, 0, 0, 0.07);
  opacity:1;
}

.main-menu>ul {
margin:7px 0;

}

.main-menu li {
position:relative;
display:block;
width:250px;
  


}

.main-menu li>a {
position:relative;
width:255px;
display:table;
border-collapse:collapse;
border-spacing:0;
color:black;
font-size: 13px;
text-decoration:none;
-webkit-transform:translateZ(0) scale(1,1);
-webkit-transition:all .14s linear;
transition:all .14s linear;
font-family: 'Strait', sans-serif;
border-top:1px solid #f2f2f2;

text-shadow: 1px 1px 1px  #fff;  
}



.main-menu .nav-icon {
  
position:relative;
display:table-cell;
width:55px;
height:36px;
text-align:center;
vertical-align:middle;
font-size:18px;

}

.main-menu .nav-text  {
   
position:relative;
display:table-cell;
vertical-align:middle;
width:190px;
font-family: 'Titillium Web', sans-serif;
}





.main-menu .fb-like {

left: 180px;
position:absolute;
top: 15px;
}

.main-menu>ul.logout {
position:absolute;
left:0;
bottom:0;
  
}

.no-touch .scrollable.hover {
overflow-y:hidden;

}

.no-touch .scrollable.hover:hover {
overflow-y:auto;
overflow:visible;
  
}


/* Logo Hover Property */


.settings:hover, settings:focus {   
  background:url( https://s17.postimg.org/74cl7s05b/logo_hover.jpg);
  -webkit-transition: all 0.2s ease-in-out, width 0, height 0, top 0, left 0;
-moz-transition: all 0.2s ease-in-out, width 0, height 0, top 0, left 0;
-o-transition: all 0.2s ease-in-out, width 0, height 0, top 0, left 0;
transition: all 0.2s ease-in-out, width 0, height 0, top 0, left 0; 
}

.settings:active, settings:focus {   
  background:url( https://s3.postimg.org/bqfooag4z/startific.jpg);
  -webkit-transition: all 0.1s ease-in-out, width 0, height 0, top 0, left 0;
-moz-transition: all 0.1s ease-in-out, width 0, height 0, top 0, left 0;
-o-transition: all 0.1s ease-in-out, width 0, height 0, top 0, left 0;
transition: all 0.1s ease-in-out, width 0, height 0, top 0, left 0; 
}


a:hover,a:focus {
text-decoration:none;
border-left:0px solid #F7F7F7;



}

nav {
-webkit-user-select:none;
-moz-user-select:none;
-ms-user-select:none;
-o-user-select:none;
user-select:none;
  
}

nav ul,nav li {
outline:0;
margin:0;
padding:0;
text-transform: uppercase;
}




/* Darker element side menu Start*/


.darkerli
{
background-color:#ededed;
text-transform:capitalize;  
}

.darkerlishadow
{
background-color:#ededed;
text-transform:capitalize;  
-webkit-box-shadow: inset 0px 5px 5px -4px rgba(50, 50, 50, 0.55);
-moz-box-shadow:    inset 0px 5px 5px -4px rgba(50, 50, 50, 0.55);
box-shadow:         inset 0px 5px 5px -4px rgba(50, 50, 50, 0.55);
}


.darkerlishadowdown
{
background-color:#ededed;
text-transform:capitalize;  
-webkit-box-shadow: inset 0px -4px 5px -4px rgba(50, 50, 50, 0.55);
-moz-box-shadow:    inset 0px -4px 5px -4px rgba(50, 50, 50, 0.55);
box-shadow:         inset 0px -4px 5px -4px rgba(50, 50, 50, 0.55);
}

/* Darker element side menu End*/




.main-menu li:hover>a,nav.main-menu li.active>a,.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus,.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus,.no-touch .dashboard-page nav.dashboard-menu ul li:hover a,.dashboard-page nav.dashboard-menu ul li.active a {
color:#fff;
background-color:#00bbbb;
text-shadow: 0px 0px 0px; 
}
.area {
float: left;
background: #e2e2e2;
width: 100%;
height: 100%;
}
@font-face {
  font-family: 'Titillium Web';
  font-style: normal;
  font-weight: 300;
  src: local('Titillium WebLight'), local('TitilliumWeb-Light'), url(http://themes.googleusercontent.com/static/fonts/titilliumweb/v2/anMUvcNT0H1YN4FII8wpr24bNCNEoFTpS2BTjF6FB5E.woff) format('woff');
}


</style>