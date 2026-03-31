@extends('layouts.main')
@section('title', 'Hexavara - Start a Project')

@php
  $inputClass = 'w-full border border-slate-300 rounded-lg px-4 py-3 bg-white text-sm text-slate-800 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400';
  $errorClass = 'mt-1.5 text-sm text-red-500';
  $requiredMark = '<span class="text-red-500">*</span>';
@endphp

@section('content')
    <main class="cta-content max-w-6xl mx-auto px-6 pt-16 pb-20" id="consult">
        <section class="intro-section text-center max-w-4xl mx-auto">
          <h1 class="text-4xl md:text-5xl lg:text-[54px] font-bold text-slate-900 tracking-tight leading-tight m-0" data-i18n="html" data-en="Start a project and <span class='text-hex-blue'>grow your business</span> with technology." data-id="Mulai proyek dan <span class='text-hex-blue'>kembangkan bisnis</span> Anda dengan teknologi.">Start a project and <span class="text-hex-blue">grow your business</span> with technology.</h1>
          <p class="mt-6 text-lg text-slate-500 leading-relaxed max-w-2xl mx-auto" data-i18n="html"
             data-en="Fill in the form below or you could <a href='mailto:info@hexavara.com' class='text-slate-800 font-medium hover:text-blue-600 transition-colors'>send us an email.</a> If you prefer more quick responses, hit us up on <a href='https://wa.me/628113451550' target='_blank' rel='noopener noreferrer' class='text-slate-800 font-medium hover:text-blue-600 transition-colors'>whatsapp!</a>"
             data-id="Isi formulir di bawah ini atau Anda dapat <a href='mailto:info@hexavara.com' class='text-slate-800 font-medium hover:text-blue-600 transition-colors'>mengirimkan email.</a> Jika Anda membutuhkan respons lebih cepat, hubungi kami melalui <a href='https://wa.me/628113451550' target='_blank' rel='noopener noreferrer' class='text-slate-800 font-medium hover:text-blue-600 transition-colors'>WhatsApp!</a>">
            Fill in the form below or you could <a href="mailto:info@hexavara.com" class="text-slate-800 font-medium hover:text-blue-600 transition-colors">send us an email.</a> If you prefer more quick responses, hit us up on <a href="https://wa.me/628113451550" target="_blank" rel="noopener noreferrer" class="text-slate-800 font-medium hover:text-blue-600 transition-colors">whatsapp!</a>
          </p>
        </section>

        <section class="ai-assistant-banner mt-16 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-100 rounded-3xl p-8 flex flex-col md:flex-row gap-8 items-center justify-between shadow-sm" aria-label="AI discussion helper">
          <div class="flex items-center gap-6">
              <div class="ai-assistant-icon-wrap w-16 h-16 rounded-2xl bg-white shadow-sm flex items-center justify-center shrink-0" aria-hidden="true">
                <span class="material-symbols-outlined text-blue-600 text-4xl">auto_awesome</span>
              </div>
              <div class="ai-assistant-copy flex-1">
                <h2 class="text-xl font-bold text-slate-900 m-0 mb-2" data-i18n data-en="Confused explaining your project?" data-id="Bingung menjelaskan proyek Anda?">Confused explaining your project?</h2>
                <p class="text-sm md:text-base text-slate-600 max-w-2xl" data-i18n data-en="Use AI Assistant to help summarize and structure your project needs clearly." data-id="Gunakan AI Assistant untuk merangkum dan menyusun kebutuhan proyek Anda dengan jelas.">Use AI Assistant to help summarize and structure your project needs clearly.
                </p>
              </div>
          </div>
          <button type="button" class="ai-assistant-button bg-[#2563eb] hover:brightness-110 shadow-[0_10px_22px_rgba(37,99,235,0.22)] hover:-translate-y-1 text-white font-bold text-base px-8 py-4 rounded-xl transition-all whitespace-nowrap shrink-0 border-0 cursor-pointer" id="open-ai-discussion" data-i18n data-en="Discuss with AI First" data-id="Diskusi dengan AI Dulu">
            Discuss with AI First
          </button>
        </section>

        <section class="form-section mt-12">
          <h2 class="text-3xl font-bold text-slate-900 mb-6 m-0" data-i18n data-en="Let us know about you" data-id="Beritahu kami tentang Anda">Let us know about you</h2>
          <form id="start-project-form" class="space-y-0" action="{{ route('start-project.submit') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="form-grid grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6">
              <label class="block">
                <span class="block mb-2 text-slate-900 font-semibold text-lg" data-i18n="html" data-en="Name <span class='text-red-500'>*</span>" data-id="Nama <span class='text-red-500'>*</span>">Name {!! $requiredMark !!}</span>
                <input id="name" name="name" type="text" required placeholder="Masukkan nama Anda" class="{{ $inputClass }}" data-i18n-placeholder data-en="Input your name" data-id="Masukkan nama Anda" />
                <p class="{{ $errorClass }} hidden" data-error-for="name"></p>
              </label>
              <label class="block">
                <span class="block mb-2 text-slate-900 font-semibold text-lg" data-i18n="html" data-en="Email <span class='text-red-500'>*</span>" data-id="Email <span class='text-red-500'>*</span>">Email {!! $requiredMark !!}</span>
                <input id="email" name="email" type="email" required placeholder="Masukkan email Anda" class="{{ $inputClass }}" data-i18n-placeholder data-en="Input your email" data-id="Masukkan email Anda" />
                <p class="{{ $errorClass }} hidden" data-error-for="email"></p>
              </label>
              <label class="block">
                <span class="block mb-2 text-slate-900 font-semibold text-lg" data-i18n="html" data-en="Phone Number <span class='text-red-500'>*</span>" data-id="Nomor Telepon <span class='text-red-500'>*</span>">Phone Number {!! $requiredMark !!}</span>
                <input id="phone" name="phone" type="tel" required placeholder="Masukkan nomor Anda" class="{{ $inputClass }}" data-i18n-placeholder data-en="Input your number" data-id="Masukkan nomor Anda" />
                <p class="{{ $errorClass }} hidden" data-error-for="phone"></p>
              </label>
              <label class="block">
                <span class="block mb-2 text-slate-900 font-semibold text-lg" data-i18n data-en="Your Company" data-id="Perusahaan Anda">Your Company</span>
                <input id="company" name="company" type="text" placeholder="Masukkan perusahaan Anda" class="{{ $inputClass }}" data-i18n-placeholder data-en="Input your company" data-id="Masukkan perusahaan Anda" />
                <p class="{{ $errorClass }} hidden" data-error-for="company"></p>
              </label>
            </div>

            <label class="full-field block pt-6">
              <span class="block mb-2 text-slate-900 font-semibold text-lg" data-i18n="html" data-en="Tell Us about your project <span class='text-red-500'>*</span>" data-id="Ceritakan tentang proyek Anda <span class='text-red-500'>*</span>">Tell Us about your project {!! $requiredMark !!}</span>
              <textarea id="project_description" name="project_description" rows="5" required placeholder="Ceritakan lebih lanjut tentang proyek yang ingin Anda wujudkan" class="{{ $inputClass }} resize-y min-h-[150px]" data-i18n-placeholder data-en="Tell us more about the project you want to realize" data-id="Ceritakan lebih lanjut tentang proyek yang ingin Anda wujudkan"></textarea>
              <p class="{{ $errorClass }} hidden" data-error-for="project_description"></p>
            </label>

            <div class="form-block pt-6">
              <h3 class="text-2xl font-bold text-slate-900 mb-3 m-0" data-i18n="html" data-en="Choose the category <span class='text-red-500'>*</span>" data-id="Pilih kategori <span class='text-red-500'>*</span>">Choose the category {!! $requiredMark !!}</h3>
              <input id="category-input" name="category" type="hidden" />
              <div class="chips flex flex-wrap gap-2" id="category-chips">
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="all" data-i18n data-en="All" data-id="Semua">All</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="web-development" data-i18n data-en="Web Development" data-id="Pengembangan Web">Web Development</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="mobile-apps-development" data-i18n data-en="Mobile Apps Development" data-id="Pengembangan Aplikasi Mobile">Mobile Apps Development</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="gis" data-i18n data-en="GIS" data-id="GIS">GIS</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="internet-of-things" data-i18n data-en="Internet of Things" data-id="Internet of Things">Internet of Things</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="erp" data-i18n data-en="ERP" data-id="ERP">ERP</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="accounting-software" data-i18n data-en="Accounting Software" data-id="Perangkat Lunak Akuntansi">Accounting Software</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="network-security" data-i18n data-en="Network Security" data-id="Keamanan Jaringan">Network Security</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="endpoint-security" data-i18n data-en="Endpoint Security" data-id="Keamanan Endpoint">Endpoint Security</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="cloud-security" data-i18n data-en="Cloud Security" data-id="Keamanan Cloud">Cloud Security</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="advertising" data-i18n data-en="Advertising" data-id="Periklanan">Advertising</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="digital-branding" data-i18n data-en="Digital Branding" data-id="Branding Digital">Digital Branding</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="aerial-photography-videography" data-i18n data-en="Aerial Photography Videography" data-id="Fotografi Udara Videografi">Aerial Photography Videography</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="videography" data-i18n data-en="Videography" data-id="Videografi">Videography</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="branding" data-i18n data-en="Branding" data-id="Branding">Branding</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="motion-graphic" data-i18n data-en="Motion Graphic" data-id="Grafis Gerak (Motion)">Motion Graphic</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="graphic-design" data-i18n data-en="Graphic Design" data-id="Desain Grafis">Graphic Design</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="3d-assets" data-i18n data-en="3D Assets" data-id="Aset 3D">3D Assets</button>
              </div>
              <p class="{{ $errorClass }} hidden" data-error-for="category"></p>
            </div>

            <div class="form-block pt-6">
              <h3 class="text-2xl font-bold text-slate-900 mb-3 m-0" data-i18n="html" data-en="Budget (in IDR/Indonesian Rupiah) <span class='text-red-500'>*</span>" data-id="Anggaran (dalam IDR/Rupiah Indonesia) <span class='text-red-500'>*</span>">Budget (in IDR/Indonesian Rupiah) {!! $requiredMark !!}</h3>
              <input id="budget-input" name="budget" type="hidden" />
              <div class="chips flex flex-wrap gap-2" id="budget-chips">
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="< 50JT">&lt; 50JT</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="50JT - 100JT">50JT - 100JT</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="100JT - 300JT">100JT - 300JT</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="300JT - 1M">300JT - 1M</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="1M - 3M">1M - 3M</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="3M - 10M">3M - 10M</button>
                <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors" data-value="> 10M">&gt; 10M</button>
              </div>
              <p class="{{ $errorClass }} hidden" data-error-for="budget"></p>
            </div>

            <div class="form-block pt-6">
              <h3 class="text-2xl font-bold text-slate-900 mb-3 m-0" data-i18n data-en="Upload Project Brief" data-id="Unggah Brief Proyek">Upload Project Brief</h3>
              <label class="upload-box flex flex-col items-center justify-center gap-2 border-2 border-dashed border-slate-300 bg-slate-50 rounded-lg min-h-[144px] cursor-pointer hover:bg-slate-100 transition-colors text-center w-full">
                <input id="project-file" name="file" type="file" class="hidden" accept=".svg,.png,.jpg,.jpeg,.doc,.docx,.pdf,.ppt,.pptx" />
                <span class="material-symbols-outlined upload-icon text-slate-500 text-2xl" aria-hidden="true">cloud_upload</span>
                <div class="upload-title text-blue-600 text-sm font-medium" data-i18n data-en="Click to Upload" data-id="Klik untuk Unggah">Click to Upload</div>
                <div class="upload-caption text-slate-500 text-xs" data-i18n data-en="SVG, PNG, JPG, DOCS, PDF or PPT (max. 5 MB)" data-id="SVG, PNG, JPG, DOCS, PDF atau PPT (maks. 5 MB)">SVG, PNG, JPG, DOCS, PDF or PPT (max. 5 MB)</div>
                <div id="project-file-name" class="text-sm text-slate-600 font-medium hidden"></div>
              </label>
              <p class="{{ $errorClass }} hidden" data-error-for="file"></p>
            </div>

            <div class="pt-6">
                <button id="submit-request-btn" class="submit-btn bg-hex-dark hover:shadow-2xl hover:-translate-y-1 text-white font-bold text-base px-8 py-4 rounded-xl transition-all shadow-xl block w-full md:w-auto" type="submit" data-i18n data-en="Send Request!" data-id="Kirim Permintaan!">Send Request!</button>
            </div>
          </form>
        </section>

    </main>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function getCurrentLang() {
      return localStorage.getItem('hexavara-lang') || 'en';
    }

    function setFieldError(field, message) {
      var $errorEl = $('[data-error-for="' + field + '"]');
      var $inputEl = $('#' + field);

      if (!$inputEl.length) {
        $inputEl = $('[name="' + field + '"]').first();
      }

      if (!$errorEl.length) {
        return;
      }

      $errorEl.text(message).removeClass('hidden');

      if ($inputEl.length) {
        $inputEl.addClass('border-red-500 focus:border-red-500 focus:ring-red-500');
      }
    }

    function clearFieldError(field) {
      var $errorEl = $('[data-error-for="' + field + '"]');
      var $inputEl = $('#' + field);

      if (!$inputEl.length) {
        $inputEl = $('[name="' + field + '"]').first();
      }

      if ($errorEl.length) {
        $errorEl.text('').addClass('hidden');
      }

      if ($inputEl.length) {
        $inputEl.removeClass('border-red-500 focus:border-red-500 focus:ring-red-500');
      }
    }

    function clearAllErrors() {
      $.each(['name', 'email', 'phone', 'company', 'project_description', 'category', 'budget', 'file'], function (_, field) {
        clearFieldError(field);
      });
    }

    function setChipSelection($group, $hiddenInput) {
      $group.find('.chip').on('click', function () {
        var $chip = $(this);

        $group.find('.chip')
          .removeClass('chip-active is-selected bg-blue-600 text-white border-blue-600')
          .addClass('bg-white text-slate-600 border-slate-300');

        $chip
          .addClass('chip-active is-selected bg-blue-600 text-white border-blue-600')
          .removeClass('bg-white text-slate-600 border-slate-300');

        $hiddenInput.val($chip.data('value'));
        clearFieldError($hiddenInput.attr('name'));
      });
    }

    function resetChipGroup($group, $hiddenInput) {
      $hiddenInput.val('');
      $group.find('.chip')
        .removeClass('chip-active is-selected bg-blue-600 text-white border-blue-600')
        .addClass('bg-white text-slate-600 border-slate-300');
    }

    window.handleAIDiscussion = function () {
      var lang = getCurrentLang();
      var msg = lang === 'id'
        ? 'Fitur Diskusi dengan AI saat ini sedang dalam pengembangan tahap lanjut. Silakan tinggalkan kontak Anda pada form di bawah ini agar tim spesialis kami dapat menghubungi Anda.'
        : 'The AI Discussion feature is currently in advanced development. Please leave your contact details in the form below so our specialist team can reach out to you.';

      alert(msg);
    };

    $(function () {
      var $startProjectForm = $('#start-project-form');
      var $submitBtn = $('#submit-request-btn');
      var $projectFileInput = $('#project-file');
      var $projectFileName = $('#project-file-name');
      var $categoryChips = $('#category-chips');
      var $categoryInput = $('#category-input');
      var $budgetChips = $('#budget-chips');
      var $budgetInput = $('#budget-input');

      $('#open-ai-discussion').on('click', window.handleAIDiscussion);

      if ($projectFileInput.length) {
        $projectFileInput.on('change', function () {
          var fileName = this.files && this.files.length ? this.files[0].name : '';

          clearFieldError('file');

          if (fileName) {
            $projectFileName.text(fileName).removeClass('hidden');
          } else {
            $projectFileName.text('').addClass('hidden');
          }
        });
      }

      setChipSelection($categoryChips, $categoryInput);
      setChipSelection($budgetChips, $budgetInput);

      // Set default selections
      $categoryChips.find('.chip[data-value="all"]').trigger('click');
      $budgetChips.find('.chip[data-value="< 50JT"]').trigger('click');

      $('#name, #email, #company, #project_description').on('input', function () {
        clearFieldError($(this).attr('id'));
      });

      // Phone: block invalid characters on keydown (desktop)
      $('#phone').on('keydown', function (e) {
        var controlKeys = [8, 9, 13, 27, 46, 35, 36, 37, 38, 39, 40]; // backspace, tab, enter, esc, del, end, home, arrows
        if ((e.ctrlKey || e.metaKey) && [65, 67, 86, 88, 90].indexOf(e.keyCode) !== -1) return; // ctrl/cmd+A/C/V/X/Z
        if (controlKeys.indexOf(e.keyCode) !== -1) return;
        if (!/^[0-9()+]$/.test(e.key)) {
          e.preventDefault();
        }
      });

      // Phone: strip invalid chars on input (handles paste, mobile autocomplete, voice input)
      $('#phone').on('input', function () {
        var $el = $(this);
        var raw = $el.val();
        var cleaned = raw.replace(/[^0-9()+]/g, '');
        if (raw !== cleaned) {
          var pos = this.selectionStart - (raw.length - cleaned.length);
          $el.val(cleaned);
          this.setSelectionRange(Math.max(0, pos), Math.max(0, pos));
        }
        clearFieldError('phone');
      });

      $startProjectForm.on('submit', function (event) {
        event.preventDefault();
        clearAllErrors();

        // FE validation for chip fields
        var lang = getCurrentLang();
        var hasChipError = false;

        if (!$categoryInput.val()) {
          setFieldError('category', lang === 'id' ? 'Silakan pilih kategori proyek.' : 'Please select a project category.');
          hasChipError = true;
        }

        if (!$budgetInput.val()) {
          setFieldError('budget', lang === 'id' ? 'Silakan pilih anggaran proyek.' : 'Please select a project budget.');
          hasChipError = true;
        }

        if (hasChipError) {
          if (!$categoryInput.val()) {
            $('html, body').animate({ scrollTop: $('#category-chips').offset().top - 120 }, 300);
          } else {
            $('html, body').animate({ scrollTop: $('#budget-chips').offset().top - 120 }, 300);
          }
          return;
        }

        $submitBtn.prop('disabled', true).addClass('opacity-70 cursor-not-allowed');

        $.ajax({
          url: $startProjectForm.attr('action'),
          method: 'POST',
          data: new FormData($startProjectForm[0]),
          processData: false,
          contentType: false,
          headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          }
        }).done(function () {
          var lang = getCurrentLang();

          $startProjectForm[0].reset();
          $categoryChips.find('.chip[data-value="all"]').trigger('click');
          $budgetChips.find('.chip[data-value="< 50JT"]').trigger('click');
          $projectFileName.text('').addClass('hidden');

          Swal.fire({
            icon: 'success',
            title: lang === 'id' ? 'Permintaan Terkirim' : 'Request Sent',
            text: lang === 'id'
              ? 'Permintaan project berhasil dikirim. Tim kami akan segera menghubungi Anda.'
              : 'Your project request has been sent successfully. Our team will contact you soon.',
            confirmButtonColor: '#2563eb'
          });
        }).fail(function (xhr) {
          var payload = xhr.responseJSON || {};

          if (xhr.status === 422 && payload.errors) {
            var firstInvalidField = Object.keys(payload.errors)[0];

            $.each(payload.errors, function (field, messages) {
              if (messages && messages[0]) {
                setFieldError(field, messages[0]);
              }
            });

            var $firstElement = $('#' + firstInvalidField);
            if (!$firstElement.length) {
              $firstElement = $('[name="' + firstInvalidField + '"]').first();
            }

            if ($firstElement.length) {
              $firstElement.trigger('focus');
            }

            return;
          }

          var lang = getCurrentLang();

          Swal.fire({
            icon: 'error',
            title: lang === 'id' ? 'Terjadi Kesalahan' : 'Something Went Wrong',
            text: lang === 'id'
              ? 'Permintaan belum bisa dikirim. Silakan coba lagi.'
              : 'The request could not be sent. Please try again.',
            confirmButtonColor: '#2563eb'
          });
        }).always(function () {
          $submitBtn.prop('disabled', false).removeClass('opacity-70 cursor-not-allowed');
        });
      });
    });
    </script>
@endpush
