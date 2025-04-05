
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>du an 1 | nhom 5</title>
  <style>
    /* Huyền bí theme */
body {
    background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
    color: #fff;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    position: relative;
}

/* Hiệu ứng hạt lấp lánh */
body::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: url('https://i.imgur.com/3K9vFvF.png') repeat;
    opacity: 0.1;
}

/* Hộp đăng nhập */
.login-box {
    background: rgba(0, 0, 0, 0.8);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 15px 5px rgba(0, 255, 255, 0.2);
    position: relative;
    z-index: 10;
}

/* Tiêu đề */
.login-box .card-header {
    background: transparent;
    border-bottom: 2px solid rgba(0, 255, 255, 0.5);
    font-size: 24px;
    font-weight: bold;
    color: cyan;
    text-shadow: 0px 0px 10px cyan;
}

/* Form */
.form-control {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(0, 255, 255, 0.5);
    color: #fff;
}

.form-control:focus {
    border-color: cyan;
    box-shadow: 0px 0px 10px cyan;
    background: rgba(255, 255, 255, 0.2);
}

/* Button */
.btn-primary {
    background: linear-gradient(45deg, #00c6ff, #0072ff);
    border: none;
    font-size: 18px;
    font-weight: bold;
    transition: 0.3s;
}

.btn-primary:hover {
    box-shadow: 0px 0px 15px cyan;
}

  </style>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css?v=3.2.0">
<script data-cfasync="false" nonce="667834de-3759-4914-865a-84ca60928918">try{(function(w,d){!function(j,k,l,m){if(j.zaraz)console.error("zaraz is loaded twice");else{j[l]=j[l]||{};j[l].executed=[];j.zaraz={deferred:[],listeners:[]};j.zaraz._v="5850";j.zaraz._n="667834de-3759-4914-865a-84ca60928918";j.zaraz.q=[];j.zaraz._f=function(n){return async function(){var o=Array.prototype.slice.call(arguments);j.zaraz.q.push({m:n,a:o})}};for(const p of["track","set","debug"])j.zaraz[p]=j.zaraz._f(p);j.zaraz.init=()=>{var q=k.getElementsByTagName(m)[0],r=k.createElement(m),s=k.getElementsByTagName("title")[0];s&&(j[l].t=k.getElementsByTagName("title")[0].text);j[l].x=Math.random();j[l].w=j.screen.width;j[l].h=j.screen.height;j[l].j=j.innerHeight;j[l].e=j.innerWidth;j[l].l=j.location.href;j[l].r=k.referrer;j[l].k=j.screen.colorDepth;j[l].n=k.characterSet;j[l].o=(new Date).getTimezoneOffset();if(j.dataLayer)for(const t of Object.entries(Object.entries(dataLayer).reduce(((u,v)=>({...u[1],...v[1]})),{})))zaraz.set(t[0],t[1],{scope:"page"});j[l].q=[];for(;j.zaraz.q.length;){const w=j.zaraz.q.shift();j[l].q.push(w)}r.defer=!0;for(const x of[localStorage,sessionStorage])Object.keys(x||{}).filter((z=>z.startsWith("_zaraz_"))).forEach((y=>{try{j[l]["z_"+y.slice(7)]=JSON.parse(x.getItem(y))}catch{j[l]["z_"+y.slice(7)]=x.getItem(y)}}));r.referrerPolicy="origin";r.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(j[l])));q.parentNode.insertBefore(r,q)};["complete","interactive"].includes(k.readyState)?zaraz.init():j.addEventListener("DOMContentLoaded",zaraz.init)}}(w,d,"zarazData","script");window.zaraz._p=async bs=>new Promise((bt=>{if(bs){bs.e&&bs.e.forEach((bu=>{try{const bv=d.querySelector("script[nonce]"),bw=bv?.nonce||bv?.getAttribute("nonce"),bx=d.createElement("script");bw&&(bx.nonce=bw);bx.innerHTML=bu;bx.onload=()=>{d.head.removeChild(bx)};d.head.appendChild(bx)}catch(by){console.error(`Error executing script: ${bu}\n`,by)}}));Promise.allSettled((bs.f||[]).map((bz=>fetch(bz[0],bz[1]))))}bt()}));zaraz._p({"e":["(function(w,d){})(window,document)"]});})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>
<body class="hold-transition login-page">
<div class="login-box">
  
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Admin</b>STP</a>
    </div>
    <div class="card-body">
    <h5 class="text-primary">Chào mừng trở lại !</h5>
                                    <?php if (isset($_SESSION['error'])) { ?>
                                        <div class="text-danger"><?= $_SESSION['error'] ?></div>
                                    <?php } else { ?>
                                        <div class="login-box-msg">Vui lòng đăng nhập để tiếp tục!</div>
                                    <?php } ?>

      <form action="<?= BASE_URL_ADMIN . '?act=check-login-admin'?>" method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
          </div>
          
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      

      <p class="mb-1">
        <a href="#">Quên mật khẩu</a>
      </p>
     
    </div>
    
  </div>
  
</div>



<script src="./assets/plugins/jquery/jquery.min.js"></script>

<script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="./assets/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>
