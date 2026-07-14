{{-- WhatsApp Lead-Capture Chat Widget --}}
<style>
    .wa-hidden {
        display: none !important;
    }

    @keyframes wa-pulse-ring {
        0% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.55);
        }

        70% {
            box-shadow: 0 0 0 14px rgba(37, 211, 102, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
        }
    }

    #wa-float-btn {
        animation: wa-pulse-ring 2.4s ease-out infinite;
    }

    #wa-float-btn .wa-ico {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: opacity 0.18s, transform 0.18s;
    }

    #wa-float-btn .wa-ico-exit {
        opacity: 0;
        transform: rotate(90deg) scale(0.5);
        pointer-events: none;
    }

    #wa-float-btn .wa-ico-enter {
        opacity: 1;
        transform: rotate(0deg) scale(1);
    }

    #wa-popup {
        position: fixed;
        z-index: 9999;
        bottom: 92px;
        right: 16px;
        width: 360px;
        max-width: calc(100vw - 32px);
        opacity: 0;
        pointer-events: none;
        transform: translateY(10px) scale(0.97);
        transition: opacity 0.22s ease, transform 0.22s ease;
        filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.18));
    }

    #wa-popup.wa-open {
        opacity: 1;
        pointer-events: auto;
        transform: translateY(0) scale(1);
    }

    @media (min-width: 480px) {
        #wa-popup {
            right: 24px;
        }

        #wa-float-btn {
            right: 24px !important;
            bottom: 24px !important;
        }
    }

    .wa-input {
        width: 100%;
        border: 1.5px solid #e2e8f0;
        border-radius: 8px;
        padding: 9px 12px;
        font-size: 13.5px;
        color: #1e293b;
        outline: none;
        transition: border-color 0.18s;
        font-family: 'Inter', sans-serif;
        background: #fff;
        display: block;
    }

    .wa-input:focus {
        border-color: #00B4BF;
    }

    .wa-input.wa-err {
        border-color: #ef4444;
    }

    .wa-input::placeholder {
        color: #94a3b8;
        font-size: 13px;
    }

    select.wa-input {
        appearance: none;
        -webkit-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 12px center;
        padding-right: 36px;
        cursor: pointer;
    }

    .wa-label {
        display: block;
        font-size: 12.5px;
        font-weight: 500;
        color: #475569;
        margin-bottom: 5px;
    }

    .wa-label .req {
        color: #ef4444;
        margin-left: 2px;
    }

    .wa-field {
        margin-bottom: 11px;
    }

    .wa-err-msg {
        font-size: 11px;
        color: #ef4444;
        margin-top: 3px;
        display: none;
    }

    .wa-err-msg.show {
        display: block;
    }

    .wa-btn-next,
    .wa-btn-prev,
    .wa-btn-send {
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        cursor: pointer;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: background 0.18s, color 0.18s, border-color 0.18s;
        white-space: nowrap;
    }

    .wa-btn-next {
        background: #00B4BF;
        color: #fff;
        border-radius: 8px;
        padding: 9px 18px;
        font-size: 12.5px;
    }

    .wa-btn-next:hover {
        background: #009aa4;
    }

    .wa-btn-prev {
        background: transparent;
        color: #64748b;
        border: 1.5px solid #e2e8f0;
        border-radius: 8px;
        padding: 8px 14px;
        font-size: 12.5px;
    }

    .wa-btn-prev:hover {
        border-color: #00B4BF;
        color: #00B4BF;
    }

    .wa-btn-send {
        background: #25D366;
        color: #fff;
        border-radius: 8px;
        padding: 9px 16px;
        font-size: 12.5px;
        flex: 1;
        justify-content: center;
    }

    .wa-btn-send:hover {
        background: #1db954;
    }

    .wa-dot {
        width: 8px;
        height: 8px;
        border-radius: 99px;
        background: #e2e8f0;
        display: inline-block;
        transition: background 0.2s, width 0.2s;
    }

    .wa-dot.active {
        width: 20px;
        background: #00B4BF;
    }

    .wa-dot.done {
        background: #00B4BF;
    }

    .wa-preview-box {
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        padding: 12px 14px;
        max-height: 200px;
        overflow-y: auto;
    }

    .wa-preview-row {
        display: flex;
        gap: 8px;
        line-height: 1.8;
    }

    .wa-preview-key {
        color: #94a3b8;
        flex-shrink: 0;
        width: 105px;
        font-size: 11.5px;
    }

    .wa-preview-val {
        color: #1e293b;
        font-weight: 500;
        font-size: 11.5px;
        word-break: break-word;
    }

    .wa-body {
        overflow-y: auto;
        max-height: min(420px, calc(100vh - 200px));
        padding: 14px 16px;
    }
</style>

{{-- Floating Button --}}
<button id="wa-float-btn"
    class="fixed z-[9999] w-14 h-14 rounded-full text-white flex items-center justify-center shadow-2xl"
    style="background:#25D366; bottom:24px; right:16px;" aria-label="Chat WhatsApp">
    {{-- WA icon (default) --}}
    <span id="wa-ico-chat" class="wa-ico wa-ico-enter">
        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor">
            <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.733 1.482h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
        </svg>
    </span>
    {{-- X icon (when popup open) --}}
    <span id="wa-ico-x" class="wa-ico wa-ico-exit">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </span>
</button>

{{-- Popup --}}
<div id="wa-popup" role="dialog" aria-modal="true" aria-label="Hexavara Contact">
    <div class="rounded-2xl overflow-hidden" style="border:1px solid #e2e8f0; background:#fff;">

        {{-- Header --}}
        <div class="flex items-center gap-3 px-4 py-3" style="background:#0B1221;">
            <div class="w-10 h-10 rounded-full overflow-hidden flex-shrink-0 flex items-center justify-center"
                style="background:#ffffff; border:2px solid rgba(255,255,255,0.4);">
                <img src="{{ asset('assets/img/brand-logo-main.png') }}" alt="Hexavara" class="w-7 h-7 object-contain">
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-white font-semibold text-sm leading-tight">Hexavara Technology</p>
                <p class="text-xs mt-0.5" style="color:#94a3b8;" data-i18n data-en="Hello! Tell us about your IT needs"
                    data-id="Halo! Ceritakan kebutuhan IT Anda">Halo! Ceritakan kebutuhan IT Anda</p>
            </div>
            <button id="wa-close" style="color:#64748b;" aria-label="Close" class="flex-shrink-0 ml-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Body --}}
        <div class="wa-body">
            <p id="wa-subtitle" class="text-xs italic mb-3" style="color:#94a3b8;" data-i18n
                data-en="How can we reach you?" data-id="Bagaimana kami menghubungi Anda?">Bagaimana kami menghubungi
                Anda?</p>

            {{-- Step 1 --}}
            <div id="wa-s1">
                <div class="wa-field">
                    <label class="wa-label">
                        <span data-i18n data-en="Full Name" data-id="Nama Lengkap">Nama Lengkap</span><span
                            class="req">*</span>
                    </label>
                    <input id="wa-nama" type="text" class="wa-input" data-plen="Your full name"
                        data-plid="Nama lengkap Anda" placeholder="Nama lengkap Anda">
                    <p class="wa-err-msg" id="e-nama" data-i18n data-en="Please enter your full name"
                        data-id="Mohon isi nama lengkap">Mohon isi nama lengkap</p>
                </div>
                <div class="wa-field">
                    <label class="wa-label">Email <span class="req">*</span></label>
                    <input id="wa-email" type="email" class="wa-input" data-plen="your@email.com"
                        data-plid="email@anda.com" placeholder="email@anda.com">
                    <p class="wa-err-msg" id="e-email" data-i18n data-en="Please enter a valid email"
                        data-id="Mohon isi email yang valid">Mohon isi email yang valid</p>
                </div>
                <div class="wa-field">
                    <label class="wa-label">
                        <span data-i18n data-en="WhatsApp Number" data-id="No. WhatsApp">No. WhatsApp</span><span
                            class="req">*</span>
                    </label>
                    <input id="wa-phone" type="tel" class="wa-input" data-plen="e.g. 081234567890"
                        data-plid="cth. 081234567890" placeholder="cth. 081234567890">
                    <p class="wa-err-msg" id="e-phone" data-i18n data-en="Please enter your WhatsApp number"
                        data-id="Mohon isi nomor WhatsApp">Mohon isi nomor WhatsApp</p>
                </div>
            </div>

            {{-- Step 2 --}}
            <div id="wa-s2" class="wa-hidden">
                <div class="wa-field">
                    <label class="wa-label">
                        <span data-i18n data-en="Project Details" data-id="Detail Project">Detail Project</span><span
                            class="req">*</span>
                    </label>
                    <textarea id="wa-detail" class="wa-input" rows="3" style="resize:none;"
                        data-plen="Describe your project..." data-plid="Ceritakan kebutuhan project Anda..."
                        placeholder="Ceritakan kebutuhan project Anda..."></textarea>
                    <p class="wa-err-msg" id="e-detail" data-i18n data-en="Please describe your project"
                        data-id="Mohon isi detail project">Mohon isi detail project</p>
                </div>
                <div class="wa-field">
                    <label class="wa-label">Timeline <span class="req">*</span></label>
                    <select id="wa-timeline" class="wa-input">
                        <option value="" data-en="Select timeline..." data-id="Pilih timeline...">Pilih timeline...
                        </option>
                        <option value="lt1" data-en="Within 1 month" data-id="Dalam 1 bulan">Dalam 1 bulan</option>
                        <option value="24m" data-en="Next 2-4 months" data-id="2-4 bulan ke depan">2-4 bulan ke depan
                        </option>
                        <option value="57m" data-en="Next 5-7 months" data-id="5-7 bulan ke depan">5-7 bulan ke depan
                        </option>
                        <option value="ns" data-en="Not sure" data-id="Belum tahu">Belum tahu</option>
                    </select>
                    <p class="wa-err-msg" id="e-timeline" data-i18n data-en="Please select a timeline"
                        data-id="Mohon pilih timeline">Mohon pilih timeline</p>
                </div>
                <div class="wa-field">
                    <label class="wa-label">Budget <span class="req">*</span></label>
                    <select id="wa-budget" class="wa-input">
                        <option value="" data-en="Select budget..." data-id="Pilih budget...">Pilih budget...</option>
                        <option value="b1">0 - 50 Juta</option>
                        <option value="b2">50 - 150 Juta</option>
                        <option value="b3">150 - 300 Juta</option>
                        <option value="b4">300 Juta++</option>
                    </select>
                    <p class="wa-err-msg" id="e-budget" data-i18n data-en="Please select a budget range"
                        data-id="Mohon pilih range budget">Mohon pilih range budget</p>
                </div>
            </div>

            {{-- Step 3 --}}
            <div id="wa-s3" class="wa-hidden">
                <div class="wa-field">
                    <label class="wa-label">
                        <span data-i18n data-en="Company Name" data-id="Nama Perusahaan">Nama Perusahaan</span><span
                            class="req">*</span>
                    </label>
                    <input id="wa-company" type="text" class="wa-input" data-plen="Your company name"
                        data-plid="Nama perusahaan Anda" placeholder="Nama perusahaan Anda">
                    <p class="wa-err-msg" id="e-company" data-i18n data-en="Please enter your company name"
                        data-id="Mohon isi nama perusahaan">Mohon isi nama perusahaan</p>
                </div>
                <div class="wa-field">
                    <label class="wa-label">
                        <span data-i18n data-en="Role / Position" data-id="Role / Posisi">Role / Posisi</span><span
                            class="req">*</span>
                    </label>
                    <input id="wa-role" type="text" class="wa-input" data-plen="e.g. CTO, Project Manager"
                        data-plid="cth. CTO, Project Manager" placeholder="cth. CTO, Project Manager">
                    <p class="wa-err-msg" id="e-role" data-i18n data-en="Please enter your role"
                        data-id="Mohon isi role/posisi Anda">Mohon isi role/posisi Anda</p>
                </div>
                <div class="wa-field">
                    <label class="wa-label">
                        <span data-i18n data-en="Number of Employees" data-id="Jumlah Karyawan">Jumlah
                            Karyawan</span><span class="req">*</span>
                    </label>
                    <select id="wa-employees" class="wa-input">
                        <option value="" data-en="Select range..." data-id="Pilih range...">Pilih range...</option>
                        <option value="e1">0 - 50</option>
                        <option value="e2">50 - 200</option>
                        <option value="e3">200+</option>
                    </select>
                    <p class="wa-err-msg" id="e-employees" data-i18n data-en="Please select employee count"
                        data-id="Mohon pilih jumlah karyawan">Mohon pilih jumlah karyawan</p>
                </div>
            </div>

            {{-- Preview --}}
            <div id="wa-preview" class="wa-hidden">
                <div class="wa-preview-box" id="wa-preview-content"></div>
            </div>

            {{-- Navigation --}}
            <div class="flex items-center justify-between mt-4 gap-2">
                <div class="flex items-center gap-1.5">
                    <span class="wa-dot active" data-sn="1"></span>
                    <span class="wa-dot" data-sn="2"></span>
                    <span class="wa-dot" data-sn="3"></span>
                </div>
                <div class="flex items-center gap-2">
                    <button class="wa-btn-prev wa-hidden" id="wa-prev">
                        &#8592; <span data-i18n data-en="PREV" data-id="KEMBALI">KEMBALI</span>
                    </button>
                    <button class="wa-btn-next" id="wa-next">
                        <span data-i18n data-en="NEXT" data-id="LANJUT">LANJUT</span> &#8594;
                    </button>
                    <button class="wa-btn-send wa-hidden" id="wa-send">
                        <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.733 1.482h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                        </svg>
                        <span data-i18n data-en="Send via WhatsApp" data-id="Kirim ke WhatsApp">Kirim ke WhatsApp</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        var step = 1;
        var TOTAL = 3;

        var floatBtn = document.getElementById('wa-float-btn');
        var icoChat = document.getElementById('wa-ico-chat');
        var icoX = document.getElementById('wa-ico-x');
        var popup = document.getElementById('wa-popup');
        var closeBtn = document.getElementById('wa-close');
        var btnPrev = document.getElementById('wa-prev');
        var btnNext = document.getElementById('wa-next');
        var btnSend = document.getElementById('wa-send');
        var subtitle = document.getElementById('wa-subtitle');
        var dots = document.querySelectorAll('.wa-dot');

        var stepEls = [null,
            document.getElementById('wa-s1'),
            document.getElementById('wa-s2'),
            document.getElementById('wa-s3'),
            document.getElementById('wa-preview')
        ];

        var subtitles = {
            1: { en: 'How can we reach you?', id: 'Bagaimana kami menghubungi Anda?' },
            2: { en: 'How can we help you?', id: 'Bagaimana kami membantu Anda?' },
            3: { en: 'Tell us about your company', id: 'Beritahu kami tentang perusahaan Anda' },
            4: { en: 'Review your details before sending', id: 'Periksa informasi Anda sebelum mengirim' }
        };

        function waLang() {
            var btn = document.querySelector('[data-lang="en"]');
            return (btn && btn.classList.contains('active')) ? 'en' : 'id';
        }
        function waShow(el) { el.classList.remove('wa-hidden'); }
        function waHide(el) { el.classList.add('wa-hidden'); }

        /* --- icon toggle --- */
        function setFloatIcon(open) {
            if (open) {
                icoChat.classList.remove('wa-ico-enter'); icoChat.classList.add('wa-ico-exit');
                icoX.classList.remove('wa-ico-exit'); icoX.classList.add('wa-ico-enter');
            } else {
                icoX.classList.remove('wa-ico-enter'); icoX.classList.add('wa-ico-exit');
                icoChat.classList.remove('wa-ico-exit'); icoChat.classList.add('wa-ico-enter');
            }
        }

        /* --- popup toggle --- */
        floatBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            var open = popup.classList.toggle('wa-open');
            setFloatIcon(open);
            if (open) updateWidgetLang();
        });
        function closePopup() {
            popup.classList.remove('wa-open');
            setFloatIcon(false);
        }
        closeBtn.addEventListener('click', function (e) { e.stopPropagation(); closePopup(); });
        document.addEventListener('click', function (e) {
            if (!popup.contains(e.target) && e.target !== floatBtn) closePopup();
        });

        /* --- show step --- */
        function showStep(s) {
            for (var i = 1; i <= TOTAL + 1; i++) { if (stepEls[i]) waHide(stepEls[i]); }

            var isPreview = (s > TOTAL);
            var el = isPreview ? stepEls[TOTAL + 1] : stepEls[s];
            if (el) waShow(el);

            if (isPreview) { buildPreview(); waHide(btnNext); waShow(btnSend); }
            else { waShow(btnNext); waHide(btnSend); }

            if (s > 1) waShow(btnPrev); else waHide(btnPrev);

            dots.forEach(function (dot) {
                var sn = parseInt(dot.getAttribute('data-sn'));
                dot.classList.remove('active', 'done');
                if (!isPreview && sn === s) dot.classList.add('active');
                else if (sn < s || isPreview) dot.classList.add('done');
            });

            var sk = isPreview ? 4 : s;
            var sub = subtitles[sk] || subtitles[1];
            var l = waLang();
            subtitle.setAttribute('data-en', sub.en);
            subtitle.setAttribute('data-id', sub.id);
            subtitle.textContent = sub[l];
        }

        /* --- validation --- */
        function check(id, errId, fn) {
            var f = document.getElementById(id), e = document.getElementById(errId);
            f.classList.remove('wa-err'); e.classList.remove('show');
            if (!fn(f.value)) { f.classList.add('wa-err'); e.classList.add('show'); return false; }
            return true;
        }
        function validate(s) {
            var ok = true;
            if (s === 1) {
                ok = check('wa-nama', 'e-nama', function (v) { return v.trim().length >= 2; }) && ok;
                ok = check('wa-email', 'e-email', function (v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()); }) && ok;
                ok = check('wa-phone', 'e-phone', function (v) { return v.trim().length >= 7; }) && ok;
            } else if (s === 2) {
                ok = check('wa-detail', 'e-detail', function (v) { return v.trim().length >= 5; }) && ok;
                ok = check('wa-timeline', 'e-timeline', function (v) { return v !== ''; }) && ok;
                ok = check('wa-budget', 'e-budget', function (v) { return v !== ''; }) && ok;
            } else if (s === 3) {
                ok = check('wa-company', 'e-company', function (v) { return v.trim().length >= 2; }) && ok;
                ok = check('wa-role', 'e-role', function (v) { return v.trim().length >= 2; }) && ok;
                ok = check('wa-employees', 'e-employees', function (v) { return v !== ''; }) && ok;
            }
            return ok;
        }

        btnNext.addEventListener('click', function () { if (!validate(step)) return; step++; showStep(step); });
        btnPrev.addEventListener('click', function () { if (step > 1) { step--; showStep(step); } });

        /* --- helpers --- */
        function optText(id) {
            var sel = document.getElementById(id), opt = sel.options[sel.selectedIndex];
            if (!opt) return '';
            return opt.getAttribute('data-' + waLang()) || opt.text;
        }
        function val(id) { return document.getElementById(id).value; }

        /* --- preview --- */
        function buildPreview() {
            var isEn = waLang() === 'en';
            var rows = isEn ? [
                ['Name', val('wa-nama')], ['Email', val('wa-email')],
                ['WhatsApp', val('wa-phone')], ['Project', val('wa-detail')],
                ['Timeline', optText('wa-timeline')], ['Budget', optText('wa-budget')],
                ['Company', val('wa-company')], ['Role', val('wa-role')],
                ['Employees', optText('wa-employees')]
            ] : [
                ['Nama', val('wa-nama')], ['Email', val('wa-email')],
                ['WhatsApp', val('wa-phone')], ['Project', val('wa-detail')],
                ['Timeline', optText('wa-timeline')], ['Budget', optText('wa-budget')],
                ['Perusahaan', val('wa-company')], ['Role', val('wa-role')],
                ['Karyawan', optText('wa-employees')]
            ];
            document.getElementById('wa-preview-content').innerHTML = rows.map(function (r) {
                return '<div class="wa-preview-row"><span class="wa-preview-key">' + r[0]
                    + '</span><span class="wa-preview-val">' + r[1] + '</span></div>';
            }).join('');
        }

        /* --- send --- */
        btnSend.addEventListener('click', function () {
            var isEn = waLang() === 'en';
            var tl = optText('wa-timeline');
            var bud = optText('wa-budget');
            var emp = optText('wa-employees');
            /* Build wave emoji from code point to avoid file-encoding corruption */
            var wave = String.fromCodePoint ? String.fromCodePoint(128075) : String.fromCharCode(0xD83D, 0xDC4B);
            var msg = isEn
                ? 'Hello Hexavara' + '\n\n'
                + 'Name: ' + val('wa-nama') + '\n'
                + 'Email: ' + val('wa-email') + '\n'
                + 'WhatsApp: ' + val('wa-phone') + '\n'
                + 'Project Details: ' + val('wa-detail') + '\n'
                + 'Timeline: ' + tl + '\n'
                + 'Budget: ' + bud + '\n'
                + 'Company: ' + val('wa-company') + '\n'
                + 'Role: ' + val('wa-role') + '\n'
                + 'Employees: ' + emp + '\n\n'
                + "I'm interested in discussing further. Thank you!"
                : 'Halo Hexavara' + '\n\n'
                + 'Nama: ' + val('wa-nama') + '\n'
                + 'Email: ' + val('wa-email') + '\n'
                + 'No. WhatsApp: ' + val('wa-phone') + '\n'
                + 'Detail Project: ' + val('wa-detail') + '\n'
                + 'Timeline: ' + tl + '\n'
                + 'Budget: ' + bud + '\n'
                + 'Nama Perusahaan: ' + val('wa-company') + '\n'
                + 'Role/Posisi: ' + val('wa-role') + '\n'
                + 'Jumlah Karyawan: ' + emp + '\n\n'
                + 'Saya tertarik untuk berdiskusi lebih lanjut. Terima kasih!';

            window.open('https://wa.me/628113451550?text=' + encodeURIComponent(msg), '_blank');
            closePopup();
            setTimeout(resetWidget, 400);
        });

        /* --- reset --- */
        function resetWidget() {
            step = 1;
            ['wa-nama', 'wa-email', 'wa-phone', 'wa-detail', 'wa-company', 'wa-role'].forEach(function (id) {
                var el = document.getElementById(id); if (el) el.value = '';
            });
            ['wa-timeline', 'wa-budget', 'wa-employees'].forEach(function (id) {
                var el = document.getElementById(id); if (el) el.selectedIndex = 0;
            });
            document.querySelectorAll('.wa-err-msg').forEach(function (e) { e.classList.remove('show'); });
            document.querySelectorAll('.wa-input.wa-err').forEach(function (e) { e.classList.remove('wa-err'); });
            showStep(1);
        }

        /* --- bilingual sync --- */
        function updateWidgetLang() {
            var l = waLang();
            document.querySelectorAll('[data-plen]').forEach(function (el) {
                el.placeholder = el.getAttribute('data-pl' + l);
            });
            document.querySelectorAll('#wa-popup select option[data-en]').forEach(function (opt) {
                var t = opt.getAttribute('data-' + l); if (t) opt.text = t;
            });
            if (!document.getElementById('wa-preview').classList.contains('wa-hidden')) buildPreview();
            var sk = (step > TOTAL) ? 4 : step;
            var sub = subtitles[sk] || subtitles[1];
            subtitle.textContent = sub[l];
        }

        document.querySelectorAll('[data-lang]').forEach(function (btn) {
            btn.addEventListener('click', function () { setTimeout(updateWidgetLang, 60); });
        });

        /* --- init --- */
        showStep(1);
        updateWidgetLang();
    })();
</script>