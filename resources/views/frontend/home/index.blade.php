@extends('layouts.app')

@section('title', 'Beranda - KBTK & Rumah Tahfid Roudhotul Ilmi')

@section('content')

<!-- Hero Slider Section -->
<section class="relative h-[600px] w-full overflow-hidden" id="beranda">
    <div id="hero-slides" class="absolute inset-0 flex transition-transform duration-700 ease-in-out" style="width:300%;">
        @php
            $slides = [
                $beranda->hero_slide_1 ? asset('storage/'.$beranda->hero_slide_1) : asset('images/b1.jpg'),
                $beranda->hero_slide_2 ? asset('storage/'.$beranda->hero_slide_2) : asset('images/b2.jpg'),
                $beranda->hero_slide_3 ? asset('storage/'.$beranda->hero_slide_3) : asset('images/b3.jpg'),
            ];
        @endphp
        @foreach($slides as $slide)
        <div class="relative flex-shrink-0" style="width:33.333%;">
            <img class="w-full h-full object-cover absolute inset-0" src="{{ $slide }}" alt="Slide {{ $loop->iteration }}"/>
            <div class="absolute inset-0 bg-gradient-to-r from-primary/75 via-primary/30 to-transparent"></div>
        </div>
        @endforeach
    </div>

    <div class="relative z-20 h-full max-w-7xl mx-auto flex flex-col justify-center px-8">
        <p class="text-white font-bold mb-4" style="font-family:Montserrat,sans-serif;font-size:52px;line-height:1.15;text-shadow:0 2px 12px rgba(0,0,0,0.3);">Selamat Datang di Roudhotul Ilmi</p>
        <p class="text-white/90 max-w-xl" style="font-family:'Plus Jakarta Sans',sans-serif;font-size:16px;line-height:1.7;">Tempat di mana ananda tumbuh dalam bimbingan nilai-nilai Islam yang murni dan modern.</p>
    </div>

    <button onclick="heroSlide(-1)" class="absolute left-4 top-1/2 -translate-y-1/2 z-30 w-12 h-12 bg-white/20 hover:bg-white/50 backdrop-blur-sm rounded-full flex items-center justify-center transition-all border border-white/30">
        <span class="material-symbols-outlined text-white" style="font-size:24px;">chevron_left</span>
    </button>
    <button onclick="heroSlide(1)" class="absolute right-4 top-1/2 -translate-y-1/2 z-30 w-12 h-12 bg-white/20 hover:bg-white/50 backdrop-blur-sm rounded-full flex items-center justify-center transition-all border border-white/30">
        <span class="material-symbols-outlined text-white" style="font-size:24px;">chevron_right</span>
    </button>
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-30 flex gap-2">
        @for($i = 0; $i < 3; $i++)
        <button onclick="heroGoTo({{ $i }})" id="hero-dot-{{ $i }}" class="hero-dot {{ $i === 0 ? 'w-8 bg-white' : 'w-2 bg-white/50' }} h-2 rounded-full transition-all"></button>
        @endfor
    </div>
</section>

<!-- Floating Greeting Card & Stats -->
<section class="max-w-7xl mx-auto px-8 -mt-24 relative z-30 grid grid-cols-1 md:grid-cols-12 gap-8" id="sambutan">
    <!-- Principal Greeting -->
    <div class="md:col-span-8 bg-white rounded-2xl shadow-xl p-8 flex flex-col md:flex-row gap-8 border border-surface-container">
        <div class="w-full md:w-1/3 aspect-[3/4] rounded-xl overflow-hidden shadow-inner bg-surface-container-low">
            @if($beranda->foto_kepala)
                <img class="w-full h-full object-cover" src="{{ asset('storage/'.$beranda->foto_kepala) }}" alt="{{ $beranda->nama_kepala }}"/>
            @else
                <img class="w-full h-full object-cover" src="{{ asset('images/guru new 9.jpg') }}" alt="{{ $beranda->nama_kepala }}"/>
            @endif
        </div>
        <div class="flex-1 flex flex-col justify-center">
            <span class="text-primary font-label-sm uppercase tracking-widest mb-2">Sambutan Yayasan Roudhotul Ilmi</span>
            <h2 class="font-h3 text-on-surface mb-4 italic">"{{ $beranda->quote_kepala }}"</h2>
            <p class="font-body-md text-on-surface-variant mb-6">{{ Str::limit($beranda->sambutan, 180) ?? 'Pendidikan di Roudhotul Ilmi bukan sekadar transfer ilmu, melainkan penanaman karakter dan kecintaan pada Al-Qur\'an sejak dini...' }}</p>
            <div class="flex items-center justify-between">
                <div>
                    <p class="font-label-md text-on-surface">{{ $beranda->nama_kepala }}</p>
                    <p class="font-body-sm text-outline">{{ $beranda->jabatan_kepala }}</p>
                </div>
                <a href="{{ route('sambutan') }}" class="bg-surface-container text-primary px-6 py-2 font-label-md hover:bg-primary-container hover:text-on-primary-container transition-colors rounded-full">Selengkapnya</a>
            </div>
        </div>
    </div>

    <!-- Stats -->
    <div class="md:col-span-4 flex flex-col gap-4">
        <div class="bg-primary p-6 rounded-2xl text-on-primary shadow-lg flex items-center gap-6">
            <span class="material-symbols-outlined text-4xl">group</span>
            <div>
                <h3 class="text-3xl font-bold">{{ $beranda->jumlah_guru }}</h3>
                <p class="font-label-md opacity-90">{{ $beranda->label_guru }}</p>
            </div>
        </div>
        <div class="bg-surface-container p-6 rounded-2xl text-on-surface shadow-lg flex items-center gap-6 border border-outline-variant">
            <span class="material-symbols-outlined text-4xl text-primary">school</span>
            <div>
                <h3 class="text-3xl font-bold text-primary">{{ $beranda->jumlah_siswa }}</h3>
                <p class="font-label-md opacity-90">{{ $beranda->label_siswa }}</p>
            </div>
        </div>
        <div class="bg-surface-container p-6 rounded-2xl text-on-surface shadow-lg flex items-center gap-6 border border-outline-variant">
            <span class="material-symbols-outlined text-4xl text-primary">class</span>
            <div>
                <h3 class="text-3xl font-bold text-primary">{{ $beranda->jumlah_rombel }}</h3>
                <p class="font-label-md opacity-90">{{ $beranda->label_rombel }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Agenda Highlight -->
<section class="max-w-7xl mx-auto px-8 py-16" id="agenda">
    <div class="flex justify-between items-center mb-8">
        <div>
            <span class="text-primary font-label-sm uppercase tracking-widest">Kegiatan Sekolah</span>
            <h2 class="font-h3 text-on-surface mt-1">Agenda Terbaru</h2>
        </div>
        <a href="{{ route('agenda') }}" class="bg-surface-container text-primary px-6 py-2 font-label-md hover:bg-primary-container hover:text-on-primary-container transition-colors rounded-full">Selengkapnya</a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @forelse($agendas as $item)
        <div class="bg-white rounded-2xl shadow border border-surface-container p-6 flex flex-col gap-3">
            <div class="flex items-center gap-2">
                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $item->status === 'akan_datang' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-600' }}">
                    {{ $item->label_status }}
                </span>
            </div>
            <h3 class="font-label-md text-on-surface">{{ $item->judul }}</h3>
            <div class="flex items-center gap-2 text-outline">
                <span class="material-symbols-outlined text-sm">calendar_today</span>
                <span class="font-body-sm">{{ $item->tanggal->translatedFormat('d F Y') }}</span>
            </div>
            @if($item->lokasi)
            <div class="flex items-center gap-2 text-outline">
                <span class="material-symbols-outlined text-sm">location_on</span>
                <span class="font-body-sm">{{ $item->lokasi }}</span>
            </div>
            @endif
        </div>
        @empty
        <div class="col-span-4 text-center text-on-surface-variant py-8">Belum ada agenda tersedia.</div>
        @endforelse
    </div>
</section>

<!-- Staf Pengajar Preview -->
<section class="bg-surface-container py-16" id="staff-pengajar">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <span class="text-primary font-label-sm uppercase tracking-widest">Tim Kami</span>
                <h2 class="font-h3 text-on-surface mt-1">Staf Pengajar</h2>
            </div>
            <a href="{{ route('staf-pengajar') }}" class="bg-surface-container-lowest text-primary px-6 py-2 font-label-md hover:bg-primary-container hover:text-on-primary-container transition-colors rounded-full shadow border border-outline-variant">Selengkapnya</a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @forelse($gurus as $guru)
            <div class="bg-white rounded-2xl shadow border border-surface-container overflow-hidden text-center">
                <div class="aspect-square overflow-hidden">
                    @if($guru->foto)
                        <img src="{{ asset('storage/'.$guru->foto) }}"
                             alt="{{ $guru->nama }}"
                             class="w-full h-full object-cover"
                             style="object-position: {{ $guru->posisi_foto ?? '50% 20%' }}"/>
                    @else
                        <img src="{{ asset('images/GURU(1).jpg') }}"
                             alt="{{ $guru->nama }}"
                             class="w-full h-full object-cover"
                             style="object-position: {{ $guru->posisi_foto ?? '50% 20%' }}"/>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="font-label-md text-on-surface">{{ $guru->nama }}</h3>
                    <p class="font-body-sm text-outline mt-1">{{ $guru->jabatan }}</p>
                </div>
            </div>
            @empty
            <div class="col-span-4 text-center text-on-surface-variant py-8">Data guru belum tersedia.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- Fasilitas Preview -->
<section class="max-w-7xl mx-auto px-8 py-16" id="fasilitas">
    <div class="mb-8">
        <span class="text-primary font-label-sm uppercase tracking-widest">Sarana Prasarana</span>
        <h2 class="font-h3 text-on-surface mt-1">Fasilitas Sekolah</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($fasilitas as $item)
        <a href="{{ route('fasilitas.detail', $item->id) }}" class="relative rounded-2xl overflow-hidden group h-[300px] cursor-pointer block">
            @if($item->gambar)
                <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
            @else
                <div class="w-full h-full bg-surface-container flex items-center justify-center">
                    <span class="material-symbols-outlined text-6xl text-outline">{{ $item->ikon ?? 'school' }}</span>
                </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                <h3 class="font-label-md text-lg">{{ $item->nama }}</h3>
                <p class="text-sm opacity-80 mt-1">{{ Str::limit($item->deskripsi, 80) }}</p>
            </div>
        </a>
        @empty
        <div class="col-span-3 text-center text-on-surface-variant py-8">Fasilitas belum tersedia.</div>
        @endforelse
    </div>
</section>

<!-- Masukan & Saran -->
<section class="bg-surface-container py-16" id="masukan">
    <div class="max-w-7xl mx-auto px-8">
        <div class="max-w-2xl mx-auto text-center mb-10">
            <span class="text-primary font-label-sm uppercase tracking-widest">Suara Anda Penting</span>
            <h2 class="font-h3 text-on-surface mt-1">Masukan &amp; Saran</h2>
            <p class="text-on-surface-variant mt-2">Sampaikan saran atau masukan untuk kemajuan Roudhotul Ilmi.</p>
        </div>
        <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-xl p-8 border border-surface-container">
            @if($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                <ul class="text-red-600 text-sm space-y-1">
                    @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('saran.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-label-md text-on-surface mb-2">Nama *</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required
                               class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="Nama Anda">
                    </div>
                    <div>
                        <label class="block font-label-md text-on-surface mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary"
                               placeholder="email@contoh.com">
                    </div>
                </div>
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Subjek</label>
                    <input type="text" name="subjek" value="{{ old('subjek') }}"
                           class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary"
                           placeholder="Topik masukan">
                </div>
                <div>
                    <label class="block font-label-md text-on-surface mb-2">Pesan *</label>
                    <textarea name="pesan" rows="5" required
                              class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary"
                              placeholder="Tuliskan saran atau masukan Anda...">{{ old('pesan') }}</textarea>
                </div>
                <button type="submit" class="w-full bg-primary text-on-primary py-3 rounded-xl font-label-md hover:bg-primary/90 transition-colors shadow">
                    Kirim Masukan
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Kontak -->
<section class="bg-white py-20" id="kontak">
    <div class="max-w-7xl mx-auto px-8">
        <h2 class="text-on-surface font-bold text-3xl mb-12" style="font-family:Montserrat,sans-serif;">Kontak</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <div class="rounded-2xl overflow-hidden shadow-md border border-surface-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.554!2d112.7191!3d-7.3243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf8381d4c79%3A0x2!2sJl.+Jetis+Kulon+VIII+No.19B%2C+Surabaya!5e0!3m2!1sid!2sid!4v1680000000000"
                        width="100%" height="360" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full"></iframe>
                <div class="p-4 bg-surface-container-low flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary">location_on</span>
                    <div>
                        <p class="font-label-md text-primary">{{ $profil->alamat ?? 'Jl. Jetis Kulon VIII No.19B, Surabaya' }}</p>
                        <p class="text-xs text-on-surface-variant">{{ $profil->kelurahan ?? 'Jetis Kulon' }}, {{ $profil->kabupaten_kota ?? 'Kota Surabaya' }}, {{ $profil->provinsi ?? 'Jawa Timur' }}</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profil->telepon ?? '6281234567890') }}" target="_blank"
                   class="flex items-center gap-4 p-5 rounded-2xl border border-surface-container hover:border-primary hover:shadow-md transition-all bg-white">
                    <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </div>
                    <div>
                        <p class="font-label-md text-on-surface">WhatsApp</p>
                        <p class="text-sm text-on-surface-variant">{{ $profil->telepon ?? '+62 812-3456-7890' }}</p>
                        <p class="text-xs text-outline">Senin – Sabtu, 07.00 – 16.00 WIB</p>
                    </div>
                </a>
                <div class="flex items-center gap-4 p-5 rounded-2xl border border-surface-container bg-white">
                    <div class="w-12 h-12 rounded-xl bg-surface-container-low flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined text-primary">location_on</span>
                    </div>
                    <div>
                        <p class="font-label-md text-on-surface">Alamat Lengkap</p>
                        <p class="text-sm text-on-surface-variant">{{ $profil->alamat ?? 'Jl. Jetis Kulon VIII No.19B' }}</p>
                        <p class="text-sm text-on-surface-variant">{{ $profil->kabupaten_kota ?? 'Surabaya' }}, {{ $profil->provinsi ?? 'Jawa Timur' }} {{ $profil->kode_pos ?? '60162' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
var heroCurrent = 0, heroTotal = 3;
var heroAutoTimer = null;
function heroUpdateUI() {
    document.getElementById('hero-slides').style.transform = 'translateX(-' + (heroCurrent * 33.333) + '%)';
    for (var i = 0; i < heroTotal; i++) {
        var dot = document.getElementById('hero-dot-' + i);
        if (i === heroCurrent) { dot.style.width = '2rem'; dot.style.opacity = '1'; dot.style.backgroundColor = 'white'; }
        else { dot.style.width = '0.5rem'; dot.style.opacity = '0.5'; dot.style.backgroundColor = 'white'; }
    }
}
function heroSlide(dir) { heroCurrent = (heroCurrent + dir + heroTotal) % heroTotal; heroUpdateUI(); resetHeroAuto(); }
function heroGoTo(idx) { heroCurrent = idx; heroUpdateUI(); resetHeroAuto(); }
function resetHeroAuto() {
    clearInterval(heroAutoTimer);
    heroAutoTimer = setInterval(function() { heroSlide(1); }, 5000);
}
resetHeroAuto();
</script>
@endpush
