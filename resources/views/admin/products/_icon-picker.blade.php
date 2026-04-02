{{-- Icon Picker Modal --}}
<div id="icon-picker-modal"
    style="display:none; position:fixed; inset:0; z-index:9999; align-items:center; justify-content:center; padding:1.5rem;">
    <div id="icon-picker-backdrop" style="position:absolute; inset:0; background:rgba(0,0,0,0.75);"></div>
    <div style="position:relative; z-index:1; display:flex; flex-direction:column; border-radius:16px; overflow:hidden; box-shadow:0 25px 60px rgba(0,0,0,0.6); background:var(--admin-card-bg); width:min(92vw,640px); max-height:82vh;">
        {{-- Header --}}
        <div class="admin-border" style="display:flex; align-items:center; justify-content:space-between; gap:0.75rem; padding:0.85rem 1.25rem; border-bottom-width:1px; border-bottom-style:solid; flex-shrink:0;">
            <span class="admin-text" style="font-size:14px; font-weight:700; display:flex; align-items:center; gap:7px;">
                <span class="material-symbols-outlined" style="font-size:18px; color:#60a5fa;">interests</span>
                Pilih Icon
            </span>
            <button type="button" onclick="closeIconPicker()" style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; border-radius:7px; background:rgba(100,116,139,0.15); color:#94a3b8; border:none; cursor:pointer;">
                <span class="material-symbols-outlined" style="font-size:18px;">close</span>
            </button>
        </div>
        {{-- Search --}}
        <div style="padding:0.75rem 1.25rem; flex-shrink:0;">
            <div style="position:relative;">
                <span class="material-symbols-outlined" style="position:absolute; left:10px; top:50%; transform:translateY(-50%); font-size:18px; color:#64748b; pointer-events:none;">search</span>
                <input type="text" id="icon-search" placeholder="Cari icon... (misal: home, cart, star)"
                    style="width:100%; padding:8px 12px 8px 36px; border-radius:8px; font-size:13px; outline:none; transition:border-color 0.2s;"
                    class="admin-input">
            </div>
            <div id="icon-search-count" class="text-[11px] admin-text-muted mt-1.5" style="text-align:right;"></div>
        </div>
        {{-- Icon Grid --}}
        <div style="overflow-y:auto; flex:1; padding:0 1.25rem 1rem;">
            <div id="icon-grid" style="display:grid; grid-template-columns:repeat(auto-fill, minmax(72px, 1fr)); gap:6px;"></div>
            <p id="icon-no-results" class="text-sm admin-text-muted text-center py-8" style="display:none;">
                <span class="material-symbols-outlined block mx-auto mb-1 opacity-40" style="font-size:28px;">search_off</span>
                Tidak ditemukan.
            </p>
        </div>
        {{-- Footer --}}
        <div class="admin-border" style="display:flex; align-items:center; justify-content:space-between; padding:0.65rem 1.25rem; border-top-width:1px; border-top-style:solid; flex-shrink:0;">
            <button type="button" onclick="clearIconSelection()" class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-lg font-semibold text-[12px] text-red-400 bg-red-500/10 border-none cursor-pointer hover:bg-red-500/20 transition-colors">
                <span class="material-symbols-outlined" style="font-size:14px;">backspace</span>
                Hapus Pilihan
            </button>
            <button type="button" onclick="closeIconPicker()" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg font-semibold text-[12px] admin-btn-secondary border-none cursor-pointer transition-all duration-150">
                Tutup
            </button>
        </div>
    </div>
</div>
