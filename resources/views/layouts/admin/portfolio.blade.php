<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jane Smith — Developer Portfolio</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body data-page="portfolio">

  <!-- Minimal portfolio navbar -->
  <nav class="navbar">
    <div class="navbar__inner">
      <span class="navbar__logo">dev<span>folio</span></span>
      <ul class="navbar__links">
        <li><a href="#projects">Projects</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="register.html" class="btn btn--outline btn--sm">Build yours</a></li>
      </ul>
    </div>
  </nav>

  <!-- Hero -->
  <section class="portfolio-hero" id="about">
    <div class="container--narrow">
      <div style="display:flex; align-items:flex-start; gap:2rem; flex-wrap:wrap;">
        <!-- Avatar -->
        <div style="width:72px; height:72px; border-radius:50%; background:var(--border); overflow:hidden; flex-shrink:0; border:1px solid var(--border);">
          <div style="width:100%; height:100%; background: linear-gradient(135deg, #D4CFC7, #A8A49C); display:flex; align-items:center; justify-content:center; font-family:var(--font-mono); font-size:1.5rem; color:#fff;">J</div>
        </div>
        <div style="flex:1;">
          <p class="section-label" style="margin-bottom:0.5rem;">// full-stack developer</p>
          <h1 style="font-size: clamp(1.8rem, 4vw, 2.8rem); margin-bottom:1rem; font-weight:400;">Jane Smith</h1>
          <p style="font-size:1rem; color:var(--text-2); line-height:1.75; max-width:520px; margin-bottom:1.5rem;">
            I build fast, thoughtful web applications. Currently focused on React, Node.js, and distributed systems.
            Open to remote opportunities.
          </p>
          <div style="display:flex; gap:0.75rem; flex-wrap:wrap; align-items:center;">
            <a href="mailto:jane@example.com" class="btn btn--primary">Get in touch</a>
            <a href="https://github.com" target="_blank" class="btn btn--outline">GitHub ↗</a>
            <a href="https://linkedin.com" target="_blank" class="btn btn--outline">LinkedIn ↗</a>
            <a href="#" class="btn btn--ghost" style="font-family:var(--font-mono); font-size:0.75rem;">Resume ↓</a>
          </div>
        </div>
      </div>

      <!-- Quick stats -->
      <div style="display:flex; gap:2rem; margin-top:3rem; flex-wrap:wrap; padding-top:2rem; border-top:1px solid var(--border);">
        <div>
          <div style="font-family:var(--font-mono); font-size:1.5rem; font-weight:300;">4+</div>
          <div class="text-xs text-faint text-mono" style="text-transform:uppercase; letter-spacing:0.06em; margin-top:0.2rem;">Years exp.</div>
        </div>
        <div>
          <div style="font-family:var(--font-mono); font-size:1.5rem; font-weight:300;">12</div>
          <div class="text-xs text-faint text-mono" style="text-transform:uppercase; letter-spacing:0.06em; margin-top:0.2rem;">Projects</div>
        </div>
        <div>
          <div style="font-family:var(--font-mono); font-size:1.5rem; font-weight:300;">8</div>
          <div class="text-xs text-faint text-mono" style="text-transform:uppercase; letter-spacing:0.06em; margin-top:0.2rem;">Skills</div>
        </div>
        <div>
          <div style="font-family:var(--font-mono); font-size:1.5rem; font-weight:300;">San Francisco, CA</div>
          <div class="text-xs text-faint text-mono" style="text-transform:uppercase; letter-spacing:0.06em; margin-top:0.2rem;">Location</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Projects -->
  <section class="portfolio-section" id="projects">
    <div class="container--narrow">
      <p class="section-label">// featured projects</p>
      <div class="project-grid">
        <div class="project-card">
          <h3 class="project-card__title">TaskFlow</h3>
          <p class="project-card__desc">A real-time collaborative task manager built with React, Socket.io, and PostgreSQL. Supports workspaces, comments, and drag-and-drop.</p>
          <div style="display:flex; gap:0.4rem; flex-wrap:wrap; margin-bottom:1rem;">
            <span class="tag">React</span>
            <span class="tag">Node.js</span>
            <span class="tag">Socket.io</span>
            <span class="tag">PostgreSQL</span>
          </div>
          <div class="project-card__links">
            <a href="#" class="project-card__link">Live demo ↗</a>
            <a href="#" class="project-card__link">GitHub ↗</a>
          </div>
        </div>

        <div class="project-card">
          <h3 class="project-card__title">Pricewatch</h3>
          <p class="project-card__desc">An e-commerce price tracker that monitors hundreds of products and sends alerts when prices drop. Built with Python and Playwright.</p>
          <div style="display:flex; gap:0.4rem; flex-wrap:wrap; margin-bottom:1rem;">
            <span class="tag">Python</span>
            <span class="tag">Playwright</span>
            <span class="tag">Redis</span>
          </div>
          <div class="project-card__links">
            <a href="#" class="project-card__link">GitHub ↗</a>
          </div>
        </div>

        <div class="project-card">
          <h3 class="project-card__title">Logcraft</h3>
          <p class="project-card__desc">A lightweight developer logging library for Node.js with structured JSON output, log levels, and Datadog/CloudWatch integrations.</p>
          <div style="display:flex; gap:0.4rem; flex-wrap:wrap; margin-bottom:1rem;">
            <span class="tag">TypeScript</span>
            <span class="tag">npm</span>
            <span class="tag">CI/CD</span>
          </div>
          <div class="project-card__links">
            <a href="#" class="project-card__link">npm ↗</a>
            <a href="#" class="project-card__link">GitHub ↗</a>
          </div>
        </div>

        <div class="project-card">
          <h3 class="project-card__title">DevDash</h3>
          <p class="project-card__desc">A personal developer dashboard that aggregates GitHub activity, Jira tickets, and Slack messages in one place.</p>
          <div style="display:flex; gap:0.4rem; flex-wrap:wrap; margin-bottom:1rem;">
            <span class="tag">Next.js</span>
            <span class="tag">OAuth</span>
            <span class="tag">REST APIs</span>
          </div>
          <div class="project-card__links">
            <a href="#" class="project-card__link">Live demo ↗</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Skills -->
  <section class="portfolio-section" id="skills">
    <div class="container--narrow">
      <p class="section-label">// skills & technologies</p>
      <div style="display:grid; grid-template-columns:1fr 1fr; gap:3rem; flex-wrap:wrap;">

        <!-- Frontend -->
        <div>
          <h4 style="font-size:0.75rem; text-transform:uppercase; letter-spacing:0.08em; color:var(--text-3); font-family:var(--font-mono); margin-bottom:1rem;">Frontend</h4>
          <div class="skill-item">
            <span class="skill-item__name">React</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="90%" style="width:0%"></div></div>
            <span class="skill-item__pct">90%</span>
          </div>
          <div class="skill-item">
            <span class="skill-item__name">TypeScript</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="85%" style="width:0%"></div></div>
            <span class="skill-item__pct">85%</span>
          </div>
          <div class="skill-item">
            <span class="skill-item__name">CSS / Tailwind</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="80%" style="width:0%"></div></div>
            <span class="skill-item__pct">80%</span>
          </div>
          <div class="skill-item">
            <span class="skill-item__name">Next.js</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="75%" style="width:0%"></div></div>
            <span class="skill-item__pct">75%</span>
          </div>
        </div>

        <!-- Backend -->
        <div>
          <h4 style="font-size:0.75rem; text-transform:uppercase; letter-spacing:0.08em; color:var(--text-3); font-family:var(--font-mono); margin-bottom:1rem;">Backend & Tools</h4>
          <div class="skill-item">
            <span class="skill-item__name">Node.js</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="88%" style="width:0%"></div></div>
            <span class="skill-item__pct">88%</span>
          </div>
          <div class="skill-item">
            <span class="skill-item__name">PostgreSQL</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="70%" style="width:0%"></div></div>
            <span class="skill-item__pct">70%</span>
          </div>
          <div class="skill-item">
            <span class="skill-item__name">Docker</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="65%" style="width:0%"></div></div>
            <span class="skill-item__pct">65%</span>
          </div>
          <div class="skill-item">
            <span class="skill-item__name">Python</span>
            <div class="skill-item__bar"><div class="skill-item__fill" data-width="60%" style="width:0%"></div></div>
            <span class="skill-item__pct">60%</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="portfolio-section" id="contact">
    <div class="container--narrow">
      <p class="section-label">// get in touch</p>
      <div style="max-width:440px;">
        <h2 style="font-size:1.5rem; font-weight:400; margin-bottom:0.75rem;">Open to opportunities</h2>
        <p class="text-muted" style="margin-bottom:1.5rem; line-height:1.7;">
          I'm currently looking for full-time remote roles. If you have an opportunity that fits, I'd love to hear from you.
        </p>
        <div style="display:flex; gap:0.75rem; flex-wrap:wrap;">
          <a href="mailto:jane@example.com" class="btn btn--primary">Send an email</a>
          <a href="https://linkedin.com" target="_blank" class="btn btn--outline">Connect on LinkedIn</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer style="border-top: 1px solid var(--border); padding: 1.5rem 0;">
    <div class="container--narrow" style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:1rem;">
      <span class="text-mono text-faint" style="font-size:0.75rem;">jane.smith — made with <a href="index.html" style="color:var(--text-3); text-decoration:underline;">devfolio</a></span>
      <a href="register.html" class="btn btn--outline btn--sm">Build your portfolio →</a>
    </div>
  </footer>

  <script src="main.js"></script>
</body>
</html>
