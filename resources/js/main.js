/* ============================================
   DevFolio — Global JavaScript
   All page interactions in one file
   ============================================ */

// ── Utility ──────────────────────────────────
const $ = (sel, ctx = document) => ctx.querySelector(sel);
const $$ = (sel, ctx = document) => [...ctx.querySelectorAll(sel)];

// ── Page Detection ───────────────────────────
const page = document.body.dataset.page;

// ── Init on DOM Ready ─────────────────────────
document.addEventListener('DOMContentLoaded', () => {
  initNavbar();
  initSidebar();
  if (page === 'home')          initHome();
  if (page === 'login')         initLogin();
  if (page === 'register')      initRegister();
  if (page === 'dashboard')     initDashboard();
  if (page === 'edit-profile')  initEditProfile();
  if (page === 'projects')      initProjects();
  if (page === 'skills')        initSkills();
  if (page === 'portfolio')     initPortfolio();
});

// ── Navbar ───────────────────────────────────
function initNavbar() {
  // Mobile menu toggle (if exists)
  const toggle = $('#nav-toggle');
  const menu = $('#nav-menu');
  if (toggle && menu) {
    toggle.addEventListener('click', () => {
      menu.classList.toggle('open');
    });
  }
}

// ── Modal Helper ─────────────────────────────
function openModal(id) {
  const overlay = $(`#${id}`);
  if (overlay) overlay.classList.add('open');
}

function closeModal(id) {
  const overlay = $(`#${id}`);
  if (overlay) overlay.classList.remove('open');
}

// Close modal on overlay click
document.addEventListener('click', (e) => {
  if (e.target.classList.contains('modal-overlay')) {
    e.target.classList.remove('open');
  }
});

// Close on [data-close-modal]
document.addEventListener('click', (e) => {
  if (e.target.closest('[data-close-modal]')) {
    const btn = e.target.closest('[data-close-modal]');
    const id = btn.dataset.closeModal;
    closeModal(id);
  }
});

// ── Alert Helper ──────────────────────────────
function showAlert(container, message, type = 'error') {
  let alert = container.querySelector('.alert');
  if (!alert) {
    alert = document.createElement('div');
    container.prepend(alert);
  }
  alert.className = `alert alert--${type}`;
  alert.textContent = message;
  setTimeout(() => alert.remove(), 4000);
}

// ── Home Page ────────────────────────────────
function initHome() {
  // Animate hero text in
  const hero = $('.home-hero');
  if (!hero) return;
  hero.style.opacity = '0';
  hero.style.transform = 'translateY(16px)';
  requestAnimationFrame(() => {
    hero.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    hero.style.opacity = '1';
    hero.style.transform = 'translateY(0)';
  });

  // Stagger feature items
  $$('.feature-item').forEach((el, i) => {
    el.style.opacity = '0';
    setTimeout(() => {
      el.style.transition = 'opacity 0.4s ease';
      el.style.opacity = '1';
    }, 300 + i * 80);
  });
}

function initLogin() {
  const form = $('#login-form');
  if (!form) return;

  form.addEventListener('submit', (e) => {
    const email = $('#login-email').value.trim();
    const pass = $('#login-pass').value;

    if (!email || !pass) {
      e.preventDefault(); // only prevent if validation fails
      showAlert(form, 'Please fill in all fields.');
      return;
    }
    // ✅ Let Laravel handle the submit — no preventDefault here
  });

  const togglePass = $('#toggle-pass');
  const passInput = $('#login-pass');
  if (togglePass && passInput) {
    togglePass.addEventListener('click', () => {
      const isText = passInput.type === 'text';
      passInput.type = isText ? 'password' : 'text';
      togglePass.textContent = isText ? 'show' : 'hide';
    });
  }
}

function initRegister() {
  const form = $('#register-form');
  if (!form) return;

  form.addEventListener('submit', (e) => {
    const name = $('#reg-name').value.trim();
    const email = $('#reg-email').value.trim();
    const pass = $('#reg-pass').value;
    const confirm = $('#reg-confirm').value;

    if (!name || !email || !pass || !confirm) {
      e.preventDefault();
      showAlert(form, 'Please fill in all fields.');
      return;
    }
    if (pass.length < 8) {
      e.preventDefault();
      showAlert(form, 'Password must be at least 8 characters.');
      return;
    }
    if (pass !== confirm) {
      e.preventDefault();
      showAlert(form, 'Passwords do not match.');
      return;
    }
    // ✅ Let Laravel handle the submit
  });

  const passInput = $('#reg-pass');
  const strengthBar = $('#pass-strength');
  if (passInput && strengthBar) {
    passInput.addEventListener('input', () => {
      const val = passInput.value;
      let score = 0;
      if (val.length >= 8) score++;
      if (/[A-Z]/.test(val)) score++;
      if (/[0-9]/.test(val)) score++;
      if (/[^A-Za-z0-9]/.test(val)) score++;
      const pct = (score / 4) * 100;
      strengthBar.style.width = pct + '%';
      strengthBar.style.background = score <= 1 ? '#C0392B' : score === 2 ? '#E67E22' : '#27AE60';
    });
  }
}

// ── Dashboard ────────────────────────────────
function initDashboard() {
  // Animate stat counters
  $$('.stat-card__num[data-count]').forEach(el => {
    const target = parseInt(el.dataset.count, 10);
    let current = 0;
    const step = Math.ceil(target / 30);
    const timer = setInterval(() => {
      current = Math.min(current + step, target);
      el.textContent = current;
      if (current >= target) clearInterval(timer);
    }, 40);
  });

  // Copy portfolio link
  const copyBtn = $('#copy-link');
  if (copyBtn) {
    copyBtn.addEventListener('click', () => {
      const url = copyBtn.dataset.url || window.location.origin + '/portfolio/demo';
      navigator.clipboard.writeText(url).then(() => {
        const orig = copyBtn.textContent;
        copyBtn.textContent = 'copied!';
        setTimeout(() => (copyBtn.textContent = orig), 2000);
      });
    });
  }
}

// ── Edit Profile ─────────────────────────────
function initEditProfile() {
  const form = $('#profile-form');
  if (!form) return;

  // Avatar preview
  const avatarInput = $('#avatar-input');
  const avatarPreview = $('#avatar-preview');
  if (avatarInput && avatarPreview) {
    avatarInput.addEventListener('change', () => {
      const file = avatarInput.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => { avatarPreview.src = e.target.result; };
        reader.readAsDataURL(file);
      }
    });
  }

  // Social link count
  const addSocial = $('#add-social');
  const socialList = $('#social-list');
  if (addSocial && socialList) {
    addSocial.addEventListener('click', () => {
    const count = socialList.querySelectorAll('.flex').length; // 👈 missing line
    const row = document.createElement('div');
    row.innerHTML = `
        <input class="form-input" name="social_links[${count}][platform]" placeholder="Platform" style="max-width:140px">
        <input class="form-input" name="social_links[${count}][url]" placeholder="URL" style="flex:1">
        <button type="button" class="btn btn--ghost btn--sm remove-social">✕</button>
    `;
    row.querySelector('.remove-social').addEventListener('click', () => row.remove());
    socialList.appendChild(row);
});
  }

  // Attach existing remove buttons
  $$('.remove-social').forEach(btn => {
    btn.addEventListener('click', () => btn.closest('.flex').remove());
  });

  // Save
  
}

// ── Projects ─────────────────────────────────
function initProjects() {
  // Open add modal
  const addBtn = $('#add-project-btn');
  if (addBtn) addBtn.addEventListener('click', () => openModal('project-modal'));

  // Close modal
  $$('[data-close-modal="project-modal"]').forEach(btn => {
    btn.addEventListener('click', () => closeModal('project-modal'));
  });

  // Project form submit
  // const projForm = $('#project-form');
  if (projForm) {
    projForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const title = $('#proj-title').value.trim();
      const desc = $('#proj-desc').value.trim();
      const tags = $('#proj-tags').value.trim();
      if (!title) { showAlert(projForm, 'Project name is required.'); return; }
      addProjectRow({ title, desc, tags });
      closeModal('project-modal');
      projForm.reset();
    });
  }

  // Delete project row
  document.addEventListener('click', (e) => {
    if (e.target.closest('.delete-project')) {
      const row = e.target.closest('tr');
      if (row && confirm('Delete this project?')) row.remove();
    }
  });
}

function addProjectRow({ title, desc, tags }) {
  const tbody = $('#projects-tbody');
  if (!tbody) return;
  const tr = document.createElement('tr');
  const tagHtml = tags.split(',').map(t => t.trim()).filter(Boolean)
    .map(t => `<span class="tag">${t}</span>`).join(' ');
  tr.innerHTML = `
    <td class="text-mono">${title}</td>
    <td class="text-muted text-sm">${desc || '—'}</td>
    <td>${tagHtml}</td>
    <td>
      <div class="flex gap-1">
        <button class="btn btn--outline btn--sm">edit</button>
        <button class="btn btn--danger btn--sm delete-project">delete</button>
      </div>
    </td>`;
  tbody.appendChild(tr);
}

// ── Skills ────────────────────────────────────
function initSkills() {
  // Open modal
  const addBtn = $('#add-skill-btn');
  if (addBtn) addBtn.addEventListener('click', () => openModal('skill-modal'));

  // Skill form
  const skillForm = $('#skill-form');
  const rangeInput = $('#skill-level');
  const rangeLabel = $('#skill-level-val');

  if (rangeInput && rangeLabel) {
    rangeInput.addEventListener('input', () => {
      rangeLabel.textContent = rangeInput.value + '%';
    });
  }

  // if (skillForm) {
  //   skillForm.addEventListener('submit', (e) => {
  //     e.preventDefault();
  //     const name = $('#skill-name').value.trim();
  //     const level = rangeInput ? rangeInput.value : 50;
  //     const category = $('#skill-category').value;
  //     if (!name) { showAlert(skillForm, 'Skill name required.'); return; }
  //     addSkillRow({ name, level, category });
  //     closeModal('skill-modal');
  //     skillForm.reset();
  //     if (rangeLabel) rangeLabel.textContent = '50%';
  //   });
  // }

  // Animate existing skill bars
  setTimeout(() => {
    $$('.skill-item__fill[data-width]').forEach(bar => {
      bar.style.width = bar.dataset.width;
    });
  }, 100);

  // Delete skill
  document.addEventListener('click', (e) => {
    if (e.target.closest('.delete-skill')) {
      const item = e.target.closest('.skill-item');
      if (item && confirm('Remove this skill?')) item.remove();
    }
  });
}

function addSkillRow({ name, level, category }) {
  const list = $('#skills-list');
  if (!list) return;
  const item = document.createElement('div');
  item.className = 'skill-item';
  item.innerHTML = `
    <span class="skill-item__name">${name}</span>
    <div class="skill-item__bar">
      <div class="skill-item__fill" data-width="${level}%" style="width:0%"></div>
    </div>
    <span class="skill-item__pct">${level}%</span>
    <span class="tag">${category}</span>
    <button class="btn btn--ghost btn--sm delete-skill" title="Remove">✕</button>
  `;
  list.appendChild(item);
  setTimeout(() => {
    item.querySelector('.skill-item__fill').style.width = level + '%';
  }, 50);
}

// ── Public Portfolio ──────────────────────────
function initPortfolio() {
  // Animate skill bars on load
  setTimeout(() => {
    $$('.skill-item__fill[data-width]').forEach(bar => {
      bar.style.width = bar.dataset.width;
    });
  }, 200);

  // Smooth scroll for nav links
  $$('a[href^="#"]').forEach(link => {
    link.addEventListener('click', (e) => {
      const target = $(link.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
}










function initSidebar() {
    const currentPath = window.location.pathname;
    
    $$('.sidebar__link').forEach(link => {
        // Remove active from all
        link.classList.remove('active');
        try {
            // Convert full URL to just pathname for comparison
            const linkPath = new URL(link.getAttribute('href')).pathname;
            if (linkPath === currentPath) {
                link.classList.add('active');
            }
        } catch {
            // For non-URL hrefs like '#' or 'login.html' — skip
        }
    });
}