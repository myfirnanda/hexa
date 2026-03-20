@extends('layouts.app')

@section('title', 'Hexavara - Start a Project')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/cta.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('content')
<div class="cta-page">
    <main class="cta-content" id="consult">

        {{-- Intro --}}
        <section class="intro-section">
            <h1 data-t="intro_title">Start a project and grow your business with technology.</h1>
            <p>
                <span data-t="intro_line1_before">By fill in the form below or you could </span><a href="mailto:info@hexavara.com" data-t="intro_line1_link">send us an email.</a>
            </p>
            <p>
                <span data-t="intro_line2_before">If you prefer to get more quick response and conversation, hit us up on </span><a href="https://wa.me/628113451550" target="_blank" rel="noopener noreferrer" data-t="intro_line2_link">whatsapp!</a>
            </p>
        </section>

        {{-- AI Assistant Banner --}}
        <section class="ai-assistant-banner" aria-label="AI discussion helper">
            <div class="ai-assistant-icon-wrap" aria-hidden="true">
                <span class="material-symbols-outlined">auto_awesome</span>
            </div>
            <div class="ai-assistant-copy">
                <h2 data-t="ai_banner_title">Confused explaining your project?</h2>
                <p data-t="ai_banner_desc">Use AI Assistant to help summarize and structure your project needs clearly.</p>
            </div>
            <button type="button" class="ai-assistant-button" id="open-ai-modal" data-t="ai_banner_btn">Discuss with AI First</button>
        </section>

        {{-- Form --}}
        <section class="form-section">
            <h2 data-t="form_title">Let us know about you</h2>

            <div class="form-grid">
                <label>
                    <span data-t="label_name">Name</span>
                    <input id="f-name" type="text" placeholder="Input your name" data-ph="ph_name">
                    <span class="field-error" id="err-name"></span>
                </label>
                <label>
                    <span data-t="label_email">Email</span>
                    <input id="f-email" type="email" placeholder="Input your email" data-ph="ph_email">
                    <span class="field-error" id="err-email"></span>
                </label>
                <label>
                    <span data-t="label_phone">Phone Number</span>
                    <input id="f-phone" type="text" placeholder="Input your number" data-ph="ph_phone">
                </label>
                <label>
                    <span data-t="label_company">Your Company</span>
                    <input id="f-company" type="text" placeholder="Input your company" data-ph="ph_company">
                </label>
            </div>

            <label class="full-field">
                <span data-t="label_project">Tell Us about your project</span>
                <textarea id="f-project" rows="5" placeholder="Tell us more about the project you want to realize" data-ph="ph_project"></textarea>
                <span class="field-error" id="err-project"></span>
            </label>

            {{-- Categories --}}
            <div class="form-block">
                <h3 data-t="cat_title">Choose the category</h3>
                <div class="chips" id="category-chips"></div>
            </div>

            {{-- Budget --}}
            <div class="form-block">
                <h3 data-t="budget_title">Budget (in IDR/Indonesian Rupiah)</h3>
                <div class="chips" id="budget-chips"></div>
            </div>

            {{-- Upload --}}
            <div class="form-block">
                <h3 data-t="upload_title_label">Upload Project Brief</h3>
                <label class="upload-box" id="upload-box">
                    <input type="file" id="f-file" accept=".svg,.png,.jpg,.jpeg,.doc,.docx,.pdf,.ppt,.pptx" style="display:none">
                    <span class="material-symbols-outlined upload-icon" aria-hidden="true">cloud_upload</span>
                    <div class="upload-title" data-t="upload_click">Click to Upload</div>
                    <div class="upload-caption" data-t="upload_caption">SVG, PNG, JPG, DOCS, PDF or PPT (max. 5 MB)</div>
                </label>
            </div>

            <button class="submit-btn" type="button" id="submit-btn" data-t="submit_btn">Send Request!</button>
        </section>

        {{-- AI Discussion Modal --}}
        <div class="ai-discussion-modal" id="ai-modal">
            <div class="ai-discussion-backdrop" id="ai-backdrop"></div>
            <div class="ai-discussion-panel" role="dialog" aria-modal="true">
                <div class="ai-discussion-head">
                    <div>
                        <h3 data-t="modal_title">AI Project Discussion Assistant</h3>
                        <p data-t="modal_desc">Structure your project needs before filling out the main form.</p>
                    </div>
                    <button type="button" class="ai-close-btn" id="ai-close" aria-label="Close dialog">&times;</button>
                </div>

                <div class="ai-discussion-grid">
                    <label>
                        <span data-t="modal_label_service">What service do you need?</span>
                        <select id="ai-service"></select>
                    </label>
                    <label>
                        <span data-t="modal_label_topic">What do you want to discuss?</span>
                        <select id="ai-topic"></select>
                    </label>
                </div>

                <div class="ai-help-section">
                    <div class="ai-help-title" data-t="ai_help_title">What can this AI help with?</div>
                    <div class="ai-help-list" id="ai-help-list"></div>
                </div>

                <label class="ai-context-field">
                    <span data-t="modal_context_label">Describe your business context (optional)</span>
                    <textarea id="ai-context" rows="4" placeholder="Example: Our process is still manual and we want to digitize reporting and approval workflows." data-ph="modal_context_ph"></textarea>
                </label>

                <div class="ai-action-row">
                    <button type="button" class="ai-generate-btn" id="ai-generate" data-t="modal_generate">Generate Draft Brief</button>
                    <button type="button" class="ai-secondary-btn" id="ai-insert" data-t="modal_insert">Insert to Form</button>
                    <button type="button" class="ai-secondary-btn" id="ai-copy" data-t="modal_copy">Copy Text</button>
                </div>

                <label class="ai-output-field">
                    <span data-t="modal_output_label">AI discussion draft</span>
                    <textarea id="ai-output" rows="8" readonly placeholder="AI summary output will appear here..." data-ph="modal_output_ph"></textarea>
                </label>
            </div>
        </div>

    </main>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
var pageTranslations = {
    en: {
        intro_title: 'Start a project and grow your business with technology.',
        intro_line1_before: 'By fill in the form below or you could ',
        intro_line1_link: 'send us an email.',
        intro_line2_before: 'If you prefer to get more quick response and conversation, hit us up on ',
        intro_line2_link: 'whatsapp!',
        ai_banner_title: 'Confused explaining your project?',
        ai_banner_desc: 'Use AI Assistant to help summarize and structure your project needs clearly.',
        ai_banner_btn: 'Discuss with AI First',
        form_title: 'Let us know about you',
        label_name: 'Name', label_email: 'Email', label_phone: 'Phone Number', label_company: 'Your Company',
        label_project: 'Tell Us about your project',
        ph_name: 'Input your name', ph_email: 'Input your email', ph_phone: 'Input your number',
        ph_company: 'Input your company', ph_project: 'Tell us more about the project you want to realize',
        cat_title: 'Choose the category',
        budget_title: 'Budget (in IDR/Indonesian Rupiah)',
        upload_title_label: 'Upload Project Brief', upload_click: 'Click to Upload',
        upload_caption: 'SVG, PNG, JPG, DOCS, PDF or PPT (max. 5 MB)',
        submit_btn: 'Send Request!',
        modal_title: 'AI Project Discussion Assistant',
        modal_desc: 'Structure your project needs before filling out the main form.',
        modal_label_service: 'What service do you need?',
        modal_label_topic: 'What do you want to discuss?',
        ai_help_title: 'What can this AI help with?',
        modal_context_label: 'Describe your business context (optional)',
        modal_context_ph: 'Example: Our process is still manual and we want to digitize reporting and approval workflows.',
        modal_generate: 'Generate Draft Brief', modal_insert: 'Insert to Form', modal_copy: 'Copy Text',
        modal_output_label: 'AI discussion draft',
        modal_output_ph: 'AI summary output will appear here...',
        success_msg: 'Request submitted successfully!'
    },
    id: {
        intro_title: 'Mulai proyek dan kembangkan bisnis Anda dengan teknologi.',
        intro_line1_before: 'Isi form di bawah ini atau Anda bisa ',
        intro_line1_link: 'kirim email ke kami.',
        intro_line2_before: 'Jika Anda ingin respons lebih cepat, hubungi kami melalui ',
        intro_line2_link: 'WhatsApp!',
        ai_banner_title: 'Masih bingung menjelaskan proyek Anda?',
        ai_banner_desc: 'Gunakan AI Assistant untuk membantu merangkum dan menyusun kebutuhan proyek Anda dengan lebih jelas.',
        ai_banner_btn: 'Diskusi dengan AI Dulu',
        form_title: 'Ceritakan kebutuhan Anda',
        label_name: 'Nama', label_email: 'Email', label_phone: 'Nomor Telepon', label_company: 'Perusahaan',
        label_project: 'Ceritakan proyek Anda',
        ph_name: 'Masukkan nama Anda', ph_email: 'Masukkan email Anda', ph_phone: 'Masukkan nomor telepon Anda',
        ph_company: 'Masukkan nama perusahaan', ph_project: 'Ceritakan kebutuhan proyek yang ingin Anda wujudkan',
        cat_title: 'Pilih kategori',
        budget_title: 'Budget (dalam IDR/Rupiah)',
        upload_title_label: 'Upload Ringkasan Proyek', upload_click: 'Klik untuk Upload',
        upload_caption: 'SVG, PNG, JPG, DOCS, PDF atau PPT (maks. 5 MB)',
        submit_btn: 'Kirim Permintaan!',
        modal_title: 'Asisten Diskusi Proyek AI',
        modal_desc: 'Susun kebutuhan proyek Anda sebelum mengisi form utama.',
        modal_label_service: 'Butuh layanan apa?',
        modal_label_topic: 'Ingin membahas apa?',
        ai_help_title: 'AI ini bisa membantu apa saja?',
        modal_context_label: 'Ceritakan konteks bisnis Anda (opsional)',
        modal_context_ph: 'Contoh: Proses kami masih manual, ingin digitalisasi agar laporan dan approval lebih cepat.',
        modal_generate: 'Buat Draft Brief', modal_insert: 'Masukkan ke Form', modal_copy: 'Salin Teks',
        modal_output_label: 'Draft hasil diskusi AI',
        modal_output_ph: 'Ringkasan dari AI akan tampil di sini...',
        success_msg: 'Permintaan berhasil dikirim!'
    }
};
</script>
<script>
(function() {
    var DATA = {
        en: {
            categories: ['All','Web Development','Mobile Apps Development','GIS','Internet of Things','ERP','Accounting Software','Network Security','Endpoint Security','Cloud Security','Advertising','Digital Branding','Aerial Photography Videography','Videography','Branding','Motion Graphic','Graphic Design','3D Assets'],
            budgets: ['< 50JT','50JT - 100JT','100JT - 300JT','300JT - 1M','1M - 3M','3M - 10M','> 10M'],
            services: ['Web Development','Mobile Apps Development','ERP System','Digital Branding','GIS','Internet of Things','Cybersecurity'],
            topics: ['Business goals','Core features','Target users','Timeline and priorities','Budget and scope','Risks and constraints'],
            helps: ['Refine requirement description','Prioritize features','Create timeline draft','Estimate initial scope','Prepare clarification questions']
        },
        id: {
            categories: ['Semua','Pengembangan Web','Pengembangan Aplikasi Mobile','GIS','Internet of Things','ERP','Software Akuntansi','Keamanan Jaringan','Keamanan Endpoint','Keamanan Cloud','Periklanan','Branding Digital','Fotografi & Videografi Udara','Videografi','Branding','Motion Graphic','Desain Grafis','Aset 3D'],
            budgets: ['< 50JT','50JT - 100JT','100JT - 300JT','300JT - 1M','1M - 3M','3M - 10M','> 10M'],
            services: ['Pengembangan Web','Pengembangan Aplikasi Mobile','Sistem ERP','Branding Digital','GIS','Internet of Things','Keamanan Siber'],
            topics: ['Tujuan bisnis','Fitur utama','Target pengguna','Timeline dan prioritas','Budget dan scope','Risiko dan kendala'],
            helps: ['Merapikan deskripsi kebutuhan','Menyusun prioritas fitur','Membuat draft timeline','Estimasi scope awal','Menyusun pertanyaan klarifikasi']
        }
    };

    var selectedCategories = new Set([0]);
    var selectedBudget = null;
    var selectedHelps = new Set();

    function getLang() { return window._currentLang || localStorage.getItem('hexavara-lang') || 'en'; }
    function d() { return DATA[getLang()] || DATA.en; }

    function renderChips(container, items, selected, isSet) {
        var html = '';
        for (var i = 0; i < items.length; i++) {
            var active = isSet ? selected.has(i) : selected === i;
            html += '<button type="button" class="chip' + (active ? ' chip-active' : '') + '" data-idx="' + i + '">' + items[i] + '</button>';
        }
        container.innerHTML = html;
    }

    function renderAll() {
        renderChips(document.getElementById('category-chips'), d().categories, selectedCategories, true);
        renderChips(document.getElementById('budget-chips'), d().budgets, selectedBudget, false);
        var svcs = d().services;
        var svcHtml = ''; for (var i = 0; i < svcs.length; i++) svcHtml += '<option value="' + svcs[i] + '">' + svcs[i] + '</option>';
        document.getElementById('ai-service').innerHTML = svcHtml;
        var tops = d().topics;
        var topHtml = ''; for (var i = 0; i < tops.length; i++) topHtml += '<option value="' + tops[i] + '">' + tops[i] + '</option>';
        document.getElementById('ai-topic').innerHTML = topHtml;
        var items = d().helps;
        var helpHtml = ''; for (var i = 0; i < items.length; i++) helpHtml += '<button type="button" class="ai-help-chip' + (selectedHelps.has(i) ? ' is-selected' : '') + '" data-idx="' + i + '">' + items[i] + '</button>';
        document.getElementById('ai-help-list').innerHTML = helpHtml;
        // Update placeholders
        var tr = pageTranslations[getLang()] || pageTranslations.en;
        document.querySelectorAll('[data-ph]').forEach(function(el) {
            var key = el.getAttribute('data-ph');
            if (tr[key]) el.placeholder = tr[key];
        });
    }

    renderAll();

    // Re-render on language change
    document.addEventListener('click', function(e) {
        var btn = e.target.closest('[data-lang]');
        if (btn) setTimeout(renderAll, 50);
    });

    document.getElementById('category-chips').addEventListener('click', function(e) {
        var btn = e.target.closest('[data-idx]');
        if (!btn) return;
        var idx = parseInt(btn.getAttribute('data-idx'), 10);
        if (selectedCategories.has(idx)) selectedCategories.delete(idx); else selectedCategories.add(idx);
        renderChips(document.getElementById('category-chips'), d().categories, selectedCategories, true);
    });

    document.getElementById('budget-chips').addEventListener('click', function(e) {
        var btn = e.target.closest('[data-idx]');
        if (!btn) return;
        var idx = parseInt(btn.getAttribute('data-idx'), 10);
        selectedBudget = (selectedBudget === idx) ? null : idx;
        renderChips(document.getElementById('budget-chips'), d().budgets, selectedBudget, false);
    });

    document.getElementById('ai-help-list').addEventListener('click', function(e) {
        var btn = e.target.closest('[data-idx]');
        if (!btn) return;
        var idx = parseInt(btn.getAttribute('data-idx'), 10);
        if (selectedHelps.has(idx)) selectedHelps.delete(idx); else selectedHelps.add(idx);
        var items = d().helps;
        var helpHtml = ''; for (var i = 0; i < items.length; i++) helpHtml += '<button type="button" class="ai-help-chip' + (selectedHelps.has(i) ? ' is-selected' : '') + '" data-idx="' + i + '">' + items[i] + '</button>';
        document.getElementById('ai-help-list').innerHTML = helpHtml;
    });

    document.getElementById('upload-box').addEventListener('click', function() {
        document.getElementById('f-file').click();
    });

    var modal = document.getElementById('ai-modal');
    document.getElementById('open-ai-modal').addEventListener('click', function() { modal.classList.add('is-open'); });
    document.getElementById('ai-close').addEventListener('click', function() { modal.classList.remove('is-open'); });
    document.getElementById('ai-backdrop').addEventListener('click', function() { modal.classList.remove('is-open'); });

    document.getElementById('ai-generate').addEventListener('click', function() {
        var service = document.getElementById('ai-service').value;
        var topic = document.getElementById('ai-topic').value;
        var context = document.getElementById('ai-context').value.trim();
        var helpItems = [];
        var items = d().helps;
        selectedHelps.forEach(function(i) { if (items[i]) helpItems.push(items[i]); });
        var draft = '=== AI Draft Brief ===\n\nService: ' + service + '\nTopic: ' + topic + '\n';
        if (context) draft += '\nBusiness Context:\n' + context + '\n';
        if (helpItems.length) draft += '\nAI Assistance Requested:\n- ' + helpItems.join('\n- ') + '\n';
        draft += '\n---\nPlease review and adjust this draft before submitting.\n';
        document.getElementById('ai-output').value = draft;
    });

    document.getElementById('ai-insert').addEventListener('click', function() {
        var output = document.getElementById('ai-output').value;
        if (output) document.getElementById('f-project').value = output;
        modal.classList.remove('is-open');
    });

    document.getElementById('ai-copy').addEventListener('click', function() {
        var output = document.getElementById('ai-output').value;
        if (output && navigator.clipboard) navigator.clipboard.writeText(output);
    });

    document.getElementById('submit-btn').addEventListener('click', function() {
        var btn = this;
        var lang = getLang();
        var tr = pageTranslations[lang] || pageTranslations.en;

        // Clear previous errors
        var fields = [
            {id: 'f-name',    errId: 'err-name',    msg: lang === 'id' ? 'Nama wajib diisi' : 'Name is required'},
            {id: 'f-email',   errId: 'err-email',   msg: lang === 'id' ? 'Email wajib diisi' : 'Email is required'},
            {id: 'f-project', errId: 'err-project', msg: lang === 'id' ? 'Deskripsi proyek wajib diisi' : 'Project description is required'}
        ];
        var hasError = false;
        fields.forEach(function(f) {
            var input = document.getElementById(f.id);
            var errEl = document.getElementById(f.errId);
            var val = input.value.trim();
            if (!val) {
                input.classList.add('input-error');
                errEl.textContent = f.msg;
                if (!hasError) { input.focus(); hasError = true; }
            } else {
                input.classList.remove('input-error');
                errEl.textContent = '';
            }
        });
        if (hasError) return;

        // Email format check
        var emailInput = document.getElementById('f-email');
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value.trim())) {
            emailInput.classList.add('input-error');
            document.getElementById('err-email').textContent = lang === 'id' ? 'Format email tidak valid' : 'Invalid email format';
            emailInput.focus();
            return;
        }

        var selectedCats = [];
        document.querySelectorAll('#category-chips .chip-active').forEach(function(c) {
            selectedCats.push(c.textContent.trim());
        });
        var selectedBudgetEl = document.querySelector('#budget-chips .chip-active');
        var selectedBudgetVal = selectedBudgetEl ? selectedBudgetEl.textContent.trim() : '';

        var formData = new FormData();
        formData.append('name', document.getElementById('f-name').value.trim());
        formData.append('email', document.getElementById('f-email').value.trim());
        formData.append('phone', document.getElementById('f-phone').value.trim());
        formData.append('company', document.getElementById('f-company').value.trim());
        formData.append('project_description', document.getElementById('f-project').value.trim());
        selectedCats.forEach(function(cat) { formData.append('categories[]', cat); });
        formData.append('budget', selectedBudgetVal);
        var fileInput = document.getElementById('f-file');
        if (fileInput.files.length) formData.append('file', fileInput.files[0]);

        btn.disabled = true;
        btn.textContent = lang === 'id' ? 'Mengirim...' : 'Sending...';

        fetch('{{ route("contact.submit") }}', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' },
            body: formData
        })
        .then(function(r) { return r.json().then(function(d) { return {ok: r.ok, data: d, status: r.status}; }); })
        .then(function(res) {
            btn.disabled = false;
            btn.textContent = tr.submit_btn || 'Send Request!';
            if (res.ok) {
                Swal.fire({
                    icon: 'success',
                    title: lang === 'id' ? 'Berhasil!' : 'Success!',
                    text: tr.success_msg || 'Request submitted successfully!',
                    confirmButtonColor: '#0c5bed',
                    timer: 2500,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
                setTimeout(function() { window.location.reload(); }, 2600);
                // Reset form
                ['f-name','f-email','f-phone','f-company','f-project'].forEach(function(id) { document.getElementById(id).value = ''; });
                ['err-name','err-email','err-project'].forEach(function(id) { document.getElementById(id).textContent = ''; });
                document.querySelectorAll('.input-error').forEach(function(el) { el.classList.remove('input-error'); });
                fileInput.value = '';
            } else {
                // Show server-side validation errors inline if available
                if (res.data.errors) {
                    var errMap = {name: 'err-name', email: 'err-email', project_description: 'err-project'};
                    Object.keys(res.data.errors).forEach(function(key) {
                        var errId = errMap[key];
                        var inputEl = document.getElementById('f-' + (key === 'project_description' ? 'project' : key));
                        if (errId) { document.getElementById(errId).textContent = res.data.errors[key][0]; }
                        if (inputEl) { inputEl.classList.add('input-error'); }
                    });
                }
                Swal.fire({
                    icon: 'error',
                    title: lang === 'id' ? 'Terjadi Kesalahan' : 'Something went wrong',
                    text: res.data.message || (lang === 'id' ? 'Periksa kembali isian form Anda.' : 'Please check your form and try again.'),
                    confirmButtonColor: '#dc2626'
                });
            }
        })
        .catch(function() {
            btn.disabled = false;
            btn.textContent = tr.submit_btn || 'Send Request!';
            Swal.fire({
                icon: 'error',
                title: lang === 'id' ? 'Koneksi Gagal' : 'Connection Error',
                text: lang === 'id' ? 'Periksa koneksi internet Anda dan coba lagi.' : 'Please check your internet connection and try again.',
                confirmButtonColor: '#dc2626'
            });
        });
    });
})();
</script>
@endpush
@endsection
