<?php
$tools = \App\Data\Portfolio::tools();

$abbr = [
    'Meta Business Suite' => 'MBS',
    'Meta Ads'           => 'MA',
    'Canva'              => 'C',
    'ManyChat'           => 'MC',
    'Notion'             => 'N',
    'Buffer'             => 'B',
    'Google Analytics'   => 'GA',
    'CapCut'             => 'CC',
    'AI Video Tools'     => 'AI',
];

$rings = [
    ['start' => 0, 'count' => 3, 'radius' => 47, 'offset' => 0],
    ['start' => 3, 'count' => 3, 'radius' => 35, 'offset' => 60],
    ['start' => 6, 'count' => 3, 'radius' => 22, 'offset' => 30],
];
?>
<section class="sec" id="tools">
    <div class="c-x">
        <div class="mb-12 text-center">
            <p class="eyebrow justify-center">Creative Ecosystem</p>
            <h2 class="title-display mt-5" data-mask-reveal>Tools I <span class="grad-text">Work With</span></h2>
        </div>

        {{-- Desktop: animated orbit (JS-driven) --}}
        <div class="tools-orbit hidden md:block" id="toolsOrbit" data-l-reveal="fade">
            {{-- Concentric rings --}}
            <div class="tools-orbit__ring"></div>
            <div class="tools-orbit__ring tools-orbit__ring--2"></div>
            <div class="tools-orbit__ring tools-orbit__ring--3"></div>

            {{-- Centre hub --}}
            <div class="tools-orbit__hub">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-electric-blue"><path d="M12 3v3m6.36-.64-2.12 2.12M21 12h-3m.64 6.36-2.12-2.12M12 21v-3m-6.36.64 2.12-2.12M3 12h3m-.64-6.36 2.12 2.12"/></svg>
                <p class="mt-1.5 text-sm font-semibold tracking-tight">Creative<br/>Ecosystem</p>
            </div>

            {{-- Orbiting tool nodes — abbreviated, positioned by JS --}}
            @foreach ($rings as $ring)
                @for ($i = 0; $i < $ring['count']; $i++)
                    @php
                        $tool = $tools[$ring['start'] + $i] ?? null;
                        if (!$tool) continue;
                        $deg  = $ring['offset'] + $i * (360 / $ring['count']);
                        $rad  = deg2rad($deg);
                        $left = round(50 + $ring['radius'] * cos($rad), 2);
                        $top  = round(50 + $ring['radius'] * sin($rad), 2);
                        $ab = $abbr[$tool['name']] ?? strtoupper(substr($tool['name'], 0, 2));
                    @endphp
                    <span class="tools-orbit__node"
                          data-color="{{ $tool['color'] }}"
                          data-name="{{ $tool['name'] }}"
                          style="left:{{ $left }}%; top:{{ $top }}%;">
                        <span class="tools-orbit__abbr" style="background:{{ $tool['color'] }};">{{ $ab }}</span>
                        {{-- Hover detail card --}}
                        <span class="tools-orbit__card">
                            <span class="tools-orbit__card-icon" style="background:{{ $tool['color'] }}20; color:{{ $tool['color'] }};">{{ $ab }}</span>
                            <span class="tools-orbit__card-info">
                                <strong>{{ $tool['name'] }}</strong>
                                <span class="tools-orbit__card-pct" style="color:{{ $tool['color'] }};">{{ $tool['pct'] }}% proficiency</span>
                            </span>
                        </span>
                    </span>
                @endfor
            @endforeach
        </div>

        {{-- Mobile / fallback chips with brand colours --}}
        <div class="mt-10 flex flex-wrap justify-center gap-3 md:hidden" data-l-reveal="up">
            @foreach ($tools as $tool)
                <span class="tool-chip" style="--chip-c: {{ $tool['color'] }};">
                    <span class="h-2.5 w-2.5 rounded-full" style="background:{{ $tool['color'] }};"></span>
                    {{ $tool['name'] }}
                </span>
            @endforeach
        </div>
    </div>
</section>
