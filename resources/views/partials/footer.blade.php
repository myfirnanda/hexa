<footer class="bg-white text-slate-600 py-16 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12 border-b border-slate-100 pb-12">
            <div class="lg:col-span-2">
                <img src="{{ asset('assets/img/brand-logo-main.png') }}" alt="Hexavara logo" class="h-12 w-auto mb-6 opacity-90">
                <div class="footer-brand-name font-bold text-slate-900 text-xl mb-2">Hexavara Technology</div>
                <div class="footer-brand-tag text-slate-500 mb-6" data-i18n
                    data-en="Software Development and IT Consulting"
                    data-id="Pengembangan Perangkat Lunak dan Konsultan IT">Software Development and IT Consulting
                </div>
                <div class="footer-brand-description text-slate-500 text-base max-w-md">
                    <strong class="text-slate-900">Surabaya</strong><br />
                    Graha Bukopin Lantai 7 dan 12, Jl. Panglima Sudirman No. 10-18, Embong Kaliasin, Genteng, Kota
                    Surabaya, Jawa Timur 60271
                </div>
            </div>
            <div>
                <h4 class="footer-heading text-slate-900 font-bold mb-6 uppercase tracking-wider text-sm" data-i18n
                    data-en="Company" data-id="Perusahaan">Company</h4>
                <ul class="space-y-4">
                    <li><a href="{{ route('works.index') }}" class="footer-link hover:text-blue-600 transition-colors" data-i18n data-en="Works" data-id="Portofolio">Works</a></li>
                    <li><a href="{{ route('about') }}" class="footer-link hover:text-blue-600 transition-colors" data-i18n data-en="About Us" data-id="Tentang Kami">About Us</a></li>
                    <li><a href="{{ route('services.index') }}" class="footer-link hover:text-blue-600 transition-colors" data-i18n data-en="Services" data-id="Layanan">Services</a></li>
                    <li><a href="{{ route('services.index') }}" class="footer-link hover:text-blue-600 transition-colors" data-i18n data-en="Solutions" data-id="Solusi">Solutions</a></li>
                </ul>
            </div>
            <div>
                <h4 class="footer-heading text-slate-900 font-bold mb-6 uppercase tracking-wider text-sm" data-i18n
                    data-en="Contact Us" data-id="Hubungi Kami">Contact Us</h4>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center gap-3"><span class="material-symbols-outlined text-slate-400">mail</span> info@hexavara.com</li>
                    <li class="flex items-center gap-3"><span class="material-symbols-outlined text-slate-400">call</span> +628113451550</li>
                </ul>
                <h4 class="footer-heading text-slate-900 font-bold mb-6 uppercase tracking-wider text-sm" data-i18n
                    data-en="Follow Us" data-id="Ikuti Kami">Follow Us</h4>
                <div class="flex gap-4">
                    <a href="https://instagram.com/hexavara"
                        class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-hex-dark hover:text-white transition-colors"
                        aria-label="Instagram">
                        <svg class="w-5 h-5 text-slate-600 hover:text-inherit" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c.796 0 1.441.645 1.441 1.44s-.645 1.44-1.441 1.44c-.795 0-1.439-.645-1.439-1.44s.644-1.44 1.439-1.44z"/></svg>
                    </a>
                    <a href="https://linkedin.com/company/hexavara"
                        class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-hex-dark hover:text-white transition-colors"
                        aria-label="LinkedIn">
                        <svg class="w-5 h-5 text-slate-600 hover:text-inherit" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <a href="https://api.whatsapp.com"
                        class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-hex-dark hover:text-white transition-colors"
                        aria-label="WhatsApp">
                        <svg class="w-5 h-5 text-slate-600 hover:text-inherit" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.733 1.482h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="footer-copyright text-sm text-slate-400" data-i18n
                data-en="© 2026 Hexavara Tech. All rights reserved."
                data-id="© 2026 Hexavara Tech. Hak cipta dilindungi.">© 2026 Hexavara Tech. All rights reserved.
            </div>
            <div class="mt-4 md:mt-0 flex gap-6 text-sm">
                <a href="#" class="hover:text-blue-600 transition-colors" data-i18n data-en="Privacy Policy" data-id="Kebijakan Privasi">Privacy Policy</a>
                <a href="#" class="hover:text-blue-600 transition-colors" data-i18n data-en="Terms of Service" data-id="Syarat Layanan">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
