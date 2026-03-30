@extends('layouts.main')

@section('title', 'Hexavara')

@push('styles')
<style>
    .is-open { display: block !important; }
    #mobile-menu.is-open { transform: translateX(0); }
    body { font-family: 'Inter', sans-serif; }
    .solutions-mega-menu { opacity: 0; transform: translateX(-50%) translateY(8px); pointer-events: none; transition: opacity 0.2s ease, transform 0.2s ease; }
    .solutions-mega-menu.is-open { opacity: 1; transform: translateX(-50%) translateY(0); pointer-events: auto; }
</style>
@endpush

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

          <div class="form-grid grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6">
            <label class="block">
              <span class="block mb-2 text-slate-900 font-semibold text-lg" data-i18n data-en="Name" data-id="Nama">Name</span>
              <input type="text" placeholder="Masukkan nama Anda" class="w-full border border-slate-300 rounded-lg px-4 py-3 bg-white text-sm text-slate-800 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400" data-i18n-placeholder data-en="Input your name" data-id="Masukkan nama Anda" />
            </label>
            <label class="block">
              <span class="block mb-2 text-slate-900 font-semibold text-lg" data-i18n data-en="Email" data-id="Email">Email</span>
              <input type="email" placeholder="Masukkan email Anda" class="w-full border border-slate-300 rounded-lg px-4 py-3 bg-white text-sm text-slate-800 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400" data-i18n-placeholder data-en="Input your email" data-id="Masukkan email Anda" />
            </label>
            <label class="block">
              <span class="block mb-2 text-slate-900 font-semibold text-lg" data-i18n data-en="Phone Number" data-id="Nomor Telepon">Phone Number</span>
              <input type="text" placeholder="Masukkan nomor Anda" class="w-full border border-slate-300 rounded-lg px-4 py-3 bg-white text-sm text-slate-800 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400" data-i18n-placeholder data-en="Input your number" data-id="Masukkan nomor Anda" />
            </label>
            <label class="block">
              <span class="block mb-2 text-slate-900 font-semibold text-lg" data-i18n data-en="Your Company" data-id="Perusahaan Anda">Your Company</span>
              <input type="text" placeholder="Masukkan perusahaan Anda" class="w-full border border-slate-300 rounded-lg px-4 py-3 bg-white text-sm text-slate-800 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400" data-i18n-placeholder data-en="Input your company" data-id="Masukkan perusahaan Anda" />
            </label>
          </div>

          <label class="full-field block mt-6">
            <span class="block mb-2 text-slate-900 font-semibold text-lg" data-i18n data-en="Tell Us about your project" data-id="Ceritakan tentang proyek Anda">Tell Us about your project</span>
            <textarea rows="5" placeholder="Ceritakan lebih lanjut tentang proyek yang ingin Anda wujudkan" class="w-full border border-slate-300 rounded-lg px-4 py-3 bg-white text-sm text-slate-800 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 resize-y min-h-[150px]" data-i18n-placeholder data-en="Tell us more about the project you want to realize" data-id="Ceritakan lebih lanjut tentang proyek yang ingin Anda wujudkan"></textarea>
          </label>

          <div class="form-block mt-8">
            <h3 class="text-2xl font-bold text-slate-900 mb-3 m-0" data-i18n data-en="Choose the category" data-id="Pilih kategori">Choose the category</h3>
            <div class="chips flex flex-wrap gap-2" id="category-chips">
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="All" data-id="Semua">All</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="Web Development" data-id="Pengembangan Web">Web Development</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="Mobile Apps Development" data-id="Pengembangan Aplikasi Mobile">Mobile Apps Development</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="GIS" data-id="GIS">GIS</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="Internet of Things" data-id="Internet of Things">Internet of Things</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="ERP" data-id="ERP">ERP</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="Accounting Software" data-id="Perangkat Lunak Akuntansi">Accounting Software</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="Network Security" data-id="Keamanan Jaringan">Network Security</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="Endpoint Security" data-id="Keamanan Endpoint">Endpoint Security</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="Cloud Security" data-id="Keamanan Cloud">Cloud Security</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="Advertising" data-id="Periklanan">Advertising</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="Digital Branding" data-id="Branding Digital">Digital Branding</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="Aerial Photography Videography" data-id="Fotografi Udara Videografi">Aerial Photography Videography</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="Videography" data-id="Videografi">Videography</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="Branding" data-id="Branding">Branding</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="Motion Graphic" data-id="Grafis Gerak (Motion)">Motion Graphic</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="Graphic Design" data-id="Desain Grafis">Graphic Design</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600" data-i18n data-en="3D Assets" data-id="Aset 3D">3D Assets</button>
            </div>
          </div>

          <div class="form-block mt-8">
            <h3 class="text-2xl font-bold text-slate-900 mb-3 m-0" data-i18n data-en="Budget (in IDR/Indonesian Rupiah)" data-id="Anggaran (dalam IDR/Rupiah Indonesia)">Budget (in IDR/Indonesian Rupiah)</h3>
            <div class="chips flex flex-wrap gap-2" id="budget-chips">
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600">&lt; 50JT</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600">50JT - 100JT</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600">100JT - 300JT</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600">300JT - 1M</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600">1M - 3M</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600">3M - 10M</button>
              <button type="button" class="chip border border-slate-300 rounded-full px-4 py-2 bg-white text-slate-600 text-sm font-medium hover:border-slate-400 cursor-pointer transition-colors [&.is-selected]:bg-blue-600 [&.is-selected]:text-white [&.is-selected]:border-blue-600 [&.chip-active]:bg-blue-600 [&.chip-active]:text-white [&.chip-active]:border-blue-600">&gt; 10M</button>
            </div>
          </div>

          <div class="form-block mt-8">
            <h3 class="text-2xl font-bold text-slate-900 mb-3 m-0" data-i18n data-en="Upload Project Brief" data-id="Unggah Brief Proyek">Upload Project Brief</h3>
            <label class="upload-box flex flex-col items-center justify-center gap-2 border-2 border-dashed border-slate-300 bg-slate-50 rounded-lg min-h-[144px] cursor-pointer hover:bg-slate-100 transition-colors text-center w-full">
              <input type="file" class="hidden" />
              <span class="material-symbols-outlined upload-icon text-slate-500 text-2xl" aria-hidden="true">cloud_upload</span>
              <div class="upload-title text-blue-600 text-sm font-medium" data-i18n data-en="Click to Upload" data-id="Klik untuk Unggah">Click to Upload</div>
              <div class="upload-caption text-slate-500 text-xs" data-i18n data-en="SVG, PNG, JPG, DOCS, PDF or PPT (max. 5 MB)" data-id="SVG, PNG, JPG, DOCS, PDF atau PPT (maks. 5 MB)">SVG, PNG, JPG, DOCS, PDF or PPT (max. 5 MB)</div>
            </label>
          </div>

          <button class="submit-btn mt-8 bg-hex-dark hover:shadow-2xl hover:-translate-y-1 text-white font-bold text-base px-8 py-4 rounded-xl transition-all shadow-xl block w-full md:w-auto" type="button" onclick="handleSubmit()" data-i18n data-en="Send Request!" data-id="Kirim Permintaan!">Send Request!</button>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        // Filters Logic
        const filterBtns = document.querySelectorAll('.btn-filter');
        const projectCards = document.querySelectorAll('.project-card');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const filter = btn.getAttribute('data-filter');

                filterBtns.forEach(b => {
                    b.classList.remove('active-filter', 'text-white');
                    b.classList.add('text-slate-500');
                });
                btn.classList.add('active-filter', 'text-white');
                btn.classList.remove('text-slate-500');

                projectCards.forEach(card => {
                    const cardFilters = card.getAttribute('data-filter').split(' ');
                    if (cardFilters.includes(filter)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Carousel logic (Transform transition)
        const nextBtn = document.getElementById('products-next');
        const prevBtn = document.getElementById('products-prev');
        const slider = document.getElementById('product-slider');
        let currentIdx = 0;

        if (nextBtn && prevBtn && slider) {
            const updateSlider = () => {
                if (!slider.firstElementChild) return;
                const cardWidth = slider.firstElementChild.offsetWidth + 24; // gap is 24px (gap-6)
                slider.style.transform = `translateX(-${currentIdx * cardWidth}px)`;
            };

            nextBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const totalCards = slider.children.length;
                const visibleCards = window.innerWidth >= 768 ? 2 : 1;
                if (currentIdx < totalCards - visibleCards) {
                    currentIdx++;
                    updateSlider();
                }
            });

            prevBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (currentIdx > 0) {
                    currentIdx--;
                    updateSlider();
                }
            });

            window.addEventListener('resize', updateSlider);
            // Initial calculation
            setTimeout(updateSlider, 500);
        }
    </script>
@endpush
