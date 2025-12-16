<?php
include('includes/constants.php');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Login</title>
  <link rel="stylesheet" href="<?=$app_path?>assets/css/style.css">
  <style>
    :root{--card-bg:rgba(255, 255, 255, 1);--accent-start:#8E2DE2;--accent-end:#4A00E0;--accent-r:142;--accent-g:45;--accent-b:226}
    html,body{height:100%}
    body{margin:0;font-family:Inter, 'Fira Sans', sans-serif;display:flex;align-items:center;justify-content:center;background:#0f1724;overflow:hidden}
    /* Background image + animated gradient overlay */
    .btn-custom{
    background: #8E2DE2;
background: linear-gradient(90deg,rgba(142, 45, 226, 1) 0%, rgba(74, 0, 224, 1) 100%);
}
.btn-custom:hover{
    background: #4A00E0;
background: linear-gradient(90deg,rgba(74, 0, 224, 1) 0%, rgba(142, 45, 226, 1) 100%);
color: #f0f0f0ff;
}
    .bg{
      position:fixed;inset:0;background-image:url('<?=$app_path?>assets/img/bg/ab-bg-1-1.jpg');background-size:cover;background-position:center;filter:brightness(.55) contrast(1.05);
    }
    .bg:after{content:"";position:absolute;inset:0;background:linear-gradient(120deg, rgba(var(--accent-r),var(--accent-g),var(--accent-b),0.20), rgba(var(--accent-r),var(--accent-g),var(--accent-b),0.10));mix-blend-mode:overlay;animation:shift 10s ease-in-out infinite}
    @keyframes shift{0%{transform:translateY(0)}50%{transform:translateY(-8%)}100%{transform:translateY(0)}}

    /* subtle floating shapes */
    .shape{position:fixed;border-radius:50%;opacity:.14;filter:blur(26px);mix-blend-mode:screen;transform:translate3d(0,0,0)}
    .shape.s1{width:480px;height:480px;background:linear-gradient(135deg,var(--accent-start),var(--accent-end));left:-120px;top:-100px;animation:float1 12s ease-in-out infinite}
    .shape.s2{width:360px;height:360px;background:linear-gradient(135deg,var(--accent-start),rgba(var(--accent-r),var(--accent-g),var(--accent-b),0.18));right:-120px;bottom:-120px;animation:float2 14s ease-in-out infinite}

    @keyframes float1{0%{transform:translateY(0) translateX(0)}50%{transform:translateY(-24px) translateX(12px)}100%{transform:translateY(0) translateX(0)}}
    @keyframes float2{0%{transform:translateY(0) translateX(0)}50%{transform:translateY(30px) translateX(-18px)}100%{transform:translateY(0) translateX(0)}}

    .login-card{width:420px;max-width:92%;background:var(--card-bg);border-radius:12px;padding:32px 28px;box-shadow:0 18px 50px rgba(2,6,23,.55);backdrop-filter:blur(6px);position:relative;z-index:5;opacity:0;transform:translateY(18px) scale(.995);animation:cardIn .7s cubic-bezier(.2,.9,.3,1) forwards}

    @keyframes cardIn{to{opacity:1;transform:none}}
    .brand{display:flex;align-items:center;gap:12px;margin-bottom:12px}
    .brand .logo{width:44px;height:44px;border-radius:8px;background:linear-gradient(135deg,var(--accent),#4FD1C5);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700}
    h3{margin:0 0 8px 0}
    .desc{color:#4b5563;margin-bottom:18px}
    .form-group{margin-bottom:14px}
    .form-control{width:100%;padding:12px 14px;border-radius:8px;border:1px solid #e6e9ef;font-size:15px}
    .btn{border:none;color:#fff;padding:12px 16px;border-radius:8px;width:100%;font-weight:600}
    /* (password toggle removed) */
    .muted{font-size:13px;color:#6b7280;text-align:center;margin-top:12px}
    @media(max-width:480px){.shape{display:none}}
  </style>
</head>
<body>
  <div class="bg" aria-hidden="true"></div>
  <div class="shape s1" aria-hidden="true"></div>
  <div class="shape s2" aria-hidden="true"></div>

  <main class="login-card" role="main">
    <div class="brand">
      <div class="logo">EP</div>
      <div>
        <h3>EasyPlus Admin</h3>
        <div class="desc">Sign in to manage the dashboard</div>
      </div>
    </div>

    <form method="post" action="authenticate.php">
      <div class="form-group">
        <input class="form-control" type="text" name="username" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="Password" required>
      </div>
      <div class="form-group">
        <button class="btn btn-custom" type="submit">Sign In</button>
      </div>
    </form>

    <div class="muted">Forgot password? <a href="forgot-password.php">Reset</a></div>
  </main>

  <script>
    // Parallax for background blobs (lightweight and defensive)
    (function(){
      let s1, s2;
      function init(){ s1 = document.querySelector('.shape.s1'); s2 = document.querySelector('.shape.s2'); }
      function onMove(e){
        if(!s1 || !s2) return;
        const x = (e.clientX - window.innerWidth/2) / (window.innerWidth/2);
        const y = (e.clientY - window.innerHeight/2) / (window.innerHeight/2);
        // subtle translation
        s1.style.transform = `translate3d(${x*18}px, ${y*18}px, 0)`;
        s2.style.transform = `translate3d(${x*-14}px, ${y*-14}px, 0)`;
      }
      window.addEventListener('load', init);
      window.addEventListener('resize', init);
      document.addEventListener('mousemove', onMove);
    })();
  </script>

</body>
</html>
