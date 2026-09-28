<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Zemovit — Site Under Maintenance</title>
  <style>
    :root{--bg:#0f1724;--card:#0b1220;--accent:#e65125;--muted:#94a3b8}
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      font-family: Inter, "Segoe UI", Tahoma, Arial, "Noto Sans", sans-serif;
      background:linear-gradient(180deg,#071029 0%, #081427 60%);
      color:#e6eef6;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:24px;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
    }
    .card{
      width:100%;
      max-width:1000px;
      background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
      border:1px solid rgba(255,255,255,0.04);
      padding:28px;
      border-radius:14px;
      box-shadow:0 8px 30px rgba(2,6,23,0.6);
      display:grid;
      grid-template-columns: 1fr 360px;
      gap:22px;
      align-items:center;
    }
    .logo{display:flex;align-items:center;gap:14px}
    .logo svg{width:56px;height:56px}
    h1{margin:0;font-size:24px}
    p.lead{margin:6px 0 0;color:var(--muted)}
    .info{font-size:15px;line-height:1.6;color:#d9e8ef}
    .actions{margin-top:14px;display:flex;gap:10px}
    .btn{padding:10px 14px;border-radius:10px;border:0;cursor:pointer;font-weight:600}
    .btn.primary{background:linear-gradient(90deg,var(--accent),#ff7a45);color:#022030}
    .btn.ghost{background:transparent;border:1px solid rgba(255,255,255,0.06);color:var(--muted)}
    .right{padding:18px;background:rgba(255,255,255,0.02);border-radius:12px;text-align:center}
    .big{font-size:48px;font-weight:700;letter-spacing:-1px;margin:6px 0}
    .small{color:var(--muted);font-size:14px}
    .contact{margin-top:14px;font-size:14px;color:var(--muted)}
    footer{margin-top:18px;color:var(--muted);font-size:13px;text-align:center}
    @media (max-width:820px){
      .card{grid-template-columns:1fr;max-width:720px}
      .right{order:-1}
    }
  </style>
</head>
<body>
  <main class="card" role="main">
    <section>
      <div class="logo" aria-hidden="true">
        <!-- simple SVG logo -->
        <!-- <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <rect width="64" height="64" rx="12" fill="url(#g)" />
          <path d="M20 36c4-6 10-10 18-10" stroke="#022030" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M20 28c4 6 10 10 18 10" stroke="#022030" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          <defs>
            <linearGradient id="g" x1="0" x2="1">
              <stop offset="0" stop-color="#e65125"/>
              <stop offset="1" stop-color="#ff7a45"/>
            </linearGradient>
          </defs>
        </svg> -->
        <div>
          <h1>Zemovit — Site Under Maintenance</h1>
          <p class="lead">We're making improvements — we'll be back shortly.</p>
        </div>
      </div>

      <div class="info" style="margin-top:18px">
        <p>Thank you for your patience. Zemovit is currently undergoing scheduled maintenance to improve the site experience. If you need immediate assistance, reach out to our support team and we will get back to you as soon as possible.</p>

        <div class="actions">
          <button class="btn primary" onclick="location.href='mailto:info@zemovit.co.uk'">Contact Support</button>
         
        </div>

        <p class="contact">Support: <a href="mailto:info@zemovit.co.uk" style="color:inherit;text-decoration:underline">info@zemovit.co.uk</a> </p>
      </div>
    </section>

    <aside class="right" aria-labelledby="uptime">
      <div id="uptime">
        <!-- <div class="small">Expected back online in</div>
        <div class="big" id="count">--:--:--</div> -->
        <!-- <div class="small" style="margin-top:6px">UTC</div> -->
      </div>
      <p class="small" style="margin-top:12px">We apologize for any inconvenience. Thank you for your understanding.</p>

      <footer>© <span id="year"></span> Zemovit</footer>
    </aside>
  </main>

  <script>
    // // Simple countdown (example: 2 hours from now)
    // (function(){
    //   // you can change hoursBelow to set a custom ETA
    //   const eta = new Date(Date.now() + 2 * 60 * 60 * 1000);
    //   const el = document.getElementById('count');
    //   const yearEl = document.getElementById('year');
    //   yearEl.textContent = new Date().getFullYear();

    //   function pad(n){return n.toString().padStart(2,'0')}
    //   function tick(){
    //     const now = new Date();
    //     let diff = Math.max(0, Math.floor((eta - now)/1000));
    //     const h = Math.floor(diff/3600); diff %= 3600;
    //     const m = Math.floor(diff/60); const s = diff%60;
    //     el.textContent = pad(h)+":"+pad(m)+":"+pad(s);
    //     if(diff<=0) clearInterval(timer);
    //   }
    //   tick();
    //   const timer = setInterval(tick,1000);
    // })();
  </script>
</body>
</html>
