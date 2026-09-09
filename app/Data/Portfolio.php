<?php

namespace App\Data;

/**
 * Static content for the Priyanka Garg portfolio.
 * Source of truth: the client's reference site
 * (https://shimmering-clafoutis-ec4458.netlify.app/).
 * Nothing here is invented — numbers, roles, links, and wording
 * are taken verbatim from the reference site.
 */
class Portfolio
{
    public const EMAIL = 'priyankagarg24priyanka@gmail.com';
    public const EMAIL_ALT = 'priyankagarg2423@gmail.com';
    public const PHONE = '9311723349';
    public const LOCATION = 'New Delhi';
    public const LINKEDIN = 'https://www.linkedin.com/in/priyanka-garg-ba3982299';
    public const INSTAGRAM = 'https://www.instagram.com/buildwith.priyanka';
    public const RESUME = '/docs/priyanka_resume.pdf';
    public const IMG_PORTRAIT = '/images/priyanka.jpeg';
    public const IMG_WORKSPACE = '/images/workspace.jpg';

    /** Navbar links. */
    public static function nav(): array
    {
        return [
            ['label' => 'Home', 'href' => '#top'],
            ['label' => 'About', 'href' => '#process'],
            ['label' => 'Experience', 'href' => '#experience'],
            ['label' => 'Services', 'href' => '#services'],
            ['label' => 'Work', 'href' => '#portfolio'],
            ['label' => 'Testimonials', 'href' => '#testimonials'],
            ['label' => 'Contact', 'href' => '#contact'],
        ];
    }

    /** Social links used in nav, footer and hero. */
    public static function socials(): array
    {
        return [
            ['label' => 'LinkedIn', 'href' => self::LINKEDIN],
            ['label' => 'Instagram', 'href' => self::INSTAGRAM],
            ['label' => 'Email', 'href' => 'mailto:'.self::EMAIL],
        ];
    }

    /** Hero + approach copy. */
    public static function hero(): array
    {
        return [
            'name' => 'Priyanka Garg',
            'first' => 'Priyanka',
            'last' => 'Garg',
            'role' => 'Social Media Marketing Executive',
            'subline' => 'Content Creator · Digital Marketing Professional',
            'intro' => 'Hi, I\'m Priyanka, a Social Media Marketing Executive passionate about creating impactful digital content and building strong brand presence.',
            'points' => [
                'Skilled in content strategy, creative designing, reel editing, social media management & audience engagement.',
                'Experienced with Instagram, Facebook, LinkedIn, Meta Ads, Canva, Photoshop & AI tools.',
                'Helping brands grow through creative ideas, engaging campaigns and result-driven marketing.',
            ],
            'location' => self::LOCATION,
            'badges' => [
                ['label' => 'Available', 'class' => 'badge-top'],
                ['value' => '1.5+ yrs', 'label' => 'exp', 'class' => 'badge-side'],
            ],
        ];
    }

    /** "The Approach" section. */
    public static function approach(): array
    {
        return [
            'eyebrow' => 'THE APPROACH',
            'titleA' => 'Branding Strategy &',
            'titleB' => 'Creativity',
            'blurb' => 'Building brands that stand out through creative thinking, powerful storytelling, and strategic digital experiences.',
            'points' => [
                ['prefix' => '', 'label' => 'Crafting unique ', 'bold' => 'brand strategies', 'suffix' => ' that create impact'],
                ['prefix' => '', 'label' => 'Turning ideas into ', 'bold' => 'engaging visuals,', 'suffix' => ' reels & content'],
                ['prefix' => '', 'label' => 'Designing ', 'bold' => 'creative campaigns', 'suffix' => ' that capture attention'],
                ['prefix' => '', 'label' => 'Creating a consistent ', 'bold' => 'brand identity', 'suffix' => ' across digital platforms'],
                ['prefix' => '', 'label' => 'Blending creativity with trends to drive ', 'bold' => 'engagement', 'suffix' => ' and growth'],
            ],
            'cards' => [
                ['icon' => '🏆', 'stat' => '500K+', 'title' => 'Total Reach', 'blurb' => null, 'gold' => true],
                ['icon' => '🎯', 'stat' => null, 'title' => 'Strategic Creativity', 'blurb' => 'Ideas that connect, content that converts.', 'gold' => false],
                ['icon' => '📊', 'stat' => null, 'title' => 'Content Strategy', 'blurb' => 'Planned. Purposeful. Powerful.', 'gold' => false],
                ['icon' => '🚀', 'stat' => null, 'title' => 'Audience Growth', 'blurb' => 'Building engaged communities that drive real results.', 'gold' => false],
            ],
        ];
    }

    /** Metrics wall. Numbers are the actual values on the reference site. */
    public static function metrics(): array
    {
        return [
            ['value' => 500, 'suffix' => 'K+', 'label' => 'Total Reach', 'decimal' => 0],
            ['value' => 1.5, 'suffix' => '+', 'label' => 'Years Experience', 'decimal' => 1],
            ['value' => 4.9, 'suffix' => '★', 'label' => 'Engagement Growth', 'decimal' => 1],
            ['value' => 100, 'suffix' => '+', 'label' => 'Daily Posts', 'decimal' => 0],
        ];
    }

    /** Career journey timeline (verbatim from reference). */
    public static function experience(): array
    {
        return [
            [
                'period' => '2025 - Present',
                'title' => 'Social Media Marketing Executive',
                'body' => 'Leading end-to-end social media strategy and execution for high-growth client portfolios.',
                'items' => ['Developing monthly content calendars', 'Performance tracking & optimisation', 'Stakeholder communication'],
            ],
            [
                'period' => '2024 - 2025',
                'title' => 'Freelancing',
                'body' => 'Delivered social media & content projects for multiple brands as an independent creator.',
                'items' => ['Content creation & reel editing', 'Brand strategy & campaign design', 'Client management & delivery'],
            ],
            [
                'period' => '2025',
                'title' => 'Digital Marketing Executive',
                'body' => 'Executed campaign metrics across continuous brand initiatives to reach a holistic audience.',
                'items' => ['Managed campaigns end-to-end', 'Cross-channel analytics & insights', 'Lead funnel optimisation'],
            ],
            [
                'period' => '2024',
                'title' => 'Digital Marketing Intern',
                'body' => 'Hands-on training program focused on the fundamentals of social media management.',
                'items' => ['Community engagement management', 'Basic graphic design experience', 'Market research & social copywriting'],
            ],
            [
                'period' => '2022 - 2025',
                'title' => 'BCA — Bachelor of Computer Applications',
                'body' => 'Management Education & Research Institute (MDU)',
                'items' => ['Foundations of computing & web technologies', 'Academic projects in design & digital media', 'Built the technical base behind my creative work'],
            ],
        ];
    }

    /** Professional highlights / skills with real percentages. */
    public static function skills(): array
    {
        return [
            'marketing' => [
                ['label' => 'Social Media Marketing', 'value' => 92, 'color' => '#5b8cff'],
                ['label' => 'Content Strategy', 'value' => 90, 'color' => '#8b3dff'],
                ['label' => 'Social Media Management', 'value' => 95, 'color' => '#22d3ee'],
                ['label' => 'Reels & Content Creation', 'value' => 92, 'color' => '#ff4d8d'],
            ],
            'tools' => [
                ['label' => 'Canva', 'value' => 95, 'color' => '#22d3ee'],
                ['label' => 'Meta Suite', 'value' => 90, 'color' => '#5b8cff'],
                ['label' => 'Analytics', 'value' => 87, 'color' => '#8b3dff'],
                ['label' => 'CapCut', 'value' => 99, 'color' => '#ff4d8d'],
            ],
            'extra' => [
                ['title' => '4.9★ Engagement Growth', 'body' => 'Driving consistent audience growth across multiple brand campaigns.'],
                ['title' => '1.5+ Year Work Integration', 'body' => 'Delivering value through collaborative teamwork and data-led decisions.'],
                ['title' => '✦ Content Creation', 'body' => ''],
            ],
            'creation' => [
                ['value' => '95%', 'label' => 'Post Quality'],
                ['value' => '100+', 'label' => 'Daily Posts'],
                ['value' => '50K+', 'label' => 'Reach Rate'],
                ['value' => 'A+', 'label' => 'Engagement'],
            ],
        ];
    }

    /** Services — all nine from the reference. */
    public static function services(): array
    {
        return [
            ['icon' => '📱', 'title' => 'Social Media Management', 'body' => 'End-to-end management of brand social presence and engagement.', 'image' => 'https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?w=600&h=420&fit=crop&q=80'],
            ['icon' => '🎯', 'title' => 'Campaign Strategy', 'body' => 'Goal-driven campaign planning tailored to your brand.', 'image' => 'https://images.unsplash.com/photo-1533750349088-cd871a92f312?w=600&h=420&fit=crop&q=80'],
            ['icon' => '🎨', 'title' => 'Brand Design', 'body' => 'Crafting visual identities that resonate with audiences.', 'image' => 'https://images.unsplash.com/photo-1614036634955-ae5e90f9b9eb?w=600&h=420&fit=crop&q=80'],
            ['icon' => '✍', 'title' => 'Content Writing', 'body' => 'Compelling copy that converts and builds connection.', 'image' => 'https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=600&h=420&fit=crop&q=80'],
            ['icon' => '📢', 'title' => 'Paid Advertising', 'body' => 'Optimised ad spend for maximum measurable returns.', 'image' => 'https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?w=600&h=420&fit=crop&q=80'],
            ['icon' => '🤝', 'title' => 'Community Growth', 'body' => 'Building loyal, engaged communities around your brand.', 'image' => 'https://images.unsplash.com/photo-1498661694102-0a3793edbe74?w=600&h=420&fit=crop&q=80'],
            ['icon' => '📈', 'title' => 'Graphic Design', 'body' => 'Scroll-stopping creatives for every platform.', 'image' => 'https://images.unsplash.com/photo-1626785774573-4b799315345d?w=600&h=420&fit=crop&q=80'],
            ['icon' => '🔗', 'title' => 'Influencer Outreach', 'body' => 'Connecting brands with the right voices.', 'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&h=420&fit=crop&q=80'],
            ['icon' => '📊', 'title' => 'Analytics & Reports', 'body' => 'Clear insights that drive smarter decisions.', 'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&h=420&fit=crop&q=80'],
        ];
    }

    /** Portfolio projects — from the reference "Curated Works". */
    public static function projects(): array
    {
        return [
            [
                'title' => 'Social Media Strategy',
                'category' => 'social',
                'categoryLabel' => 'Social',
                'kind' => 'Brand & Lifestyle — Brand Identity',
                'cover' => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=800&q=80',
                'coverAlt' => 'Social media strategy dashboard and analytics',
                'stats' => [
                    ['label' => 'IMPRESSIONS', 'value' => '1.2M+'],
                    ['label' => 'ENGAGEMENT', 'value' => '45K+'],
                    ['label' => 'REACH', 'value' => '800K+'],
                ],
                'media' => 'collage',
                'images' => [
                    'https://images.unsplash.com/photo-1596040033229-a9821ebd058d?auto=format&fit=crop&w=500&q=80',
                    'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=500&q=80',
                    'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=500&q=80',
                    'https://images.unsplash.com/photo-1509358271058-acd22cc93898?auto=format&fit=crop&w=500&q=80',
                ],
                'cta' => '#',
                'caseUrl' => null,
                'alts' => ['Bundelii Jeera creative', 'Tripsdoc creative', 'Shape Events creative', 'Avni Pure Masale creative'],
            ],
            [
                'title' => 'Brand Launch Campaign',
                'category' => 'ads',
                'categoryLabel' => 'Ads',
                'kind' => 'Generation of a Campaign',
                'cover' => 'https://images.unsplash.com/photo-1532336414038-cf19250c5757?auto=format&fit=crop&w=800&q=80',
                'coverAlt' => 'Avni Pure Masale brand campaign',
                'stats' => [
                    ['label' => 'IMPRESSIONS', 'value' => '2.5M+'],
                    ['label' => 'CONVERSIONS', 'value' => '12K+'],
                    ['label' => 'ROAS', 'value' => '4.2x'],
                ],
                'media' => 'campaign',
                'hero' => 'https://images.unsplash.com/photo-1532336414038-cf19250c5757?auto=format&fit=crop&w=700&q=80',
                'heroAlt' => 'Avni Pure Masale campaign',
                'overlayTitle' => 'Avni Pure Masale',
                'overlayTagline' => "SWAAD\nJO DIL SE\nJUDE",
                'overlaySoon' => 'COMING SOON •••',
                'cta' => '/case-study/avni',
                'caseUrl' => '/case-study/avni',
            ],
            [
                'title' => 'Viral Content Series',
                'category' => 'social',
                'categoryLabel' => 'Social',
                'kind' => 'Viral Content Series',
                'cover' => 'https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?auto=format&fit=crop&w=800&q=80',
                'coverAlt' => 'Viral content creation process',
                'stats' => [
                    ['label' => 'VIEWS', 'value' => '500K+'],
                    ['label' => 'ENGAGEMENT', 'value' => '25K+'],
                    ['label' => 'REACH', 'value' => '350K+'],
                ],
                'media' => 'reels',
                'reels' => [
                    ['video' => '/videos/video-12.mp4', 'poster' => '/videos/video-12.jpg', 'label' => '125K', 'aria' => 'Viral reel — 125K reach'],
                    ['video' => '/videos/video14.mp4', 'poster' => '/videos/video14.jpg', 'label' => '98K', 'aria' => 'Tripsdoc reel — 98K reach'],
                    ['video' => '/videos/video15.mp4', 'poster' => '/videos/video15.jpg', 'label' => '175K', 'aria' => 'Product reel — 175K reach'],
                    ['video' => '/videos/video_17.mp4', 'poster' => '/videos/video_17.jpg', 'label' => '102K', 'aria' => 'Red Apple reel — 102K reach'],
                ],
                'reelStats' => [
                    ['icon' => '👁', 'label' => 'VIEWS', 'value' => '500K+'],
                    ['icon' => '❤', 'label' => 'ENGAGEMENT', 'value' => '25K+'],
                    ['icon' => '📈', 'label' => 'REACH', 'value' => '350K+'],
                ],
                'cta' => '#',
                'caseUrl' => null,
            ],
            [
                'title' => 'Bundelii Campaign',
                'category' => 'social',
                'categoryLabel' => 'Social',
                'kind' => 'Brand & Lifestyle — Brand Identity',
                'cover' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=800&q=80',
                'coverAlt' => 'Bundelii brand campaign visuals',
                'stats' => [
                    ['label' => 'IMPRESSIONS', 'value' => '1.8M+'],
                    ['label' => 'ENGAGEMENT', 'value' => '32K+'],
                    ['label' => 'REACH', 'value' => '620K+'],
                ],
                'media' => 'collage',
                'images' => [
                    'https://images.unsplash.com/photo-1498049794561-7780e7231661?auto=format&fit=crop&w=500&q=80',
                    'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=500&q=80',
                    'https://images.unsplash.com/photo-1556742111-a301076d9d18?auto=format&fit=crop&w=500&q=80',
                    'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=500&q=80',
                ],
                'cta' => '#',
                'caseUrl' => null,
                'alts' => ['Bundelii creative 1', 'Bundelii creative 2', 'Bundelii creative 3', 'Bundelii creative 4'],
            ],
            [
                'title' => 'Tripsdoc Travel Reels',
                'category' => 'social',
                'categoryLabel' => 'Social',
                'kind' => 'Travel & Lifestyle — Content Series',
                'cover' => 'https://images.unsplash.com/photo-1488646953014-85cb44e25828?auto=format&fit=crop&w=800&q=80',
                'coverAlt' => 'Tripsdoc travel reels content',
                'stats' => [
                    ['label' => 'VIEWS', 'value' => '402K+'],
                    ['label' => 'ENGAGEMENT', 'value' => '18K+'],
                    ['label' => 'REACH', 'value' => '280K+'],
                ],
                'media' => 'reels',
                'reels' => [
                    ['video' => '/videos/ai-video-creative-1.mp4', 'poster' => '/videos/ai-video-creative-1.jpg', 'label' => '89K', 'aria' => 'Travel reel — 89K reach'],
                    ['video' => '/videos/ai-video-creative-2.mp4', 'poster' => '/videos/ai-video-creative-2.jpg', 'label' => '134K', 'aria' => 'Adventure reel — 134K reach'],
                    ['video' => '/videos/video15.mp4', 'poster' => '/videos/video15.jpg', 'label' => '67K', 'aria' => 'Destination reel — 67K reach'],
                    ['video' => '/videos/video_17.mp4', 'poster' => '/videos/video_17.jpg', 'label' => '112K', 'aria' => 'Explore reel — 112K reach'],
                ],
                'reelStats' => [
                    ['icon' => '👁', 'label' => 'VIEWS', 'value' => '402K+'],
                    ['icon' => '❤', 'label' => 'ENGAGEMENT', 'value' => '18K+'],
                    ['icon' => '📈', 'label' => 'REACH', 'value' => '280K+'],
                ],
                'cta' => '#',
                'caseUrl' => null,
            ],
            [
                'title' => 'Shape Events Coverage',
                'category' => 'ads',
                'categoryLabel' => 'Ads',
                'kind' => 'Events & Social — Campaign Management',
                'cover' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=800&q=80',
                'coverAlt' => 'Shape Events conference coverage',
                'stats' => [
                    ['label' => 'IMPRESSIONS', 'value' => '950K+'],
                    ['label' => 'ENGAGEMENT', 'value' => '28K+'],
                    ['label' => 'REACH', 'value' => '450K+'],
                ],
                'media' => 'campaign',
                'hero' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=700&q=80',
                'heroAlt' => 'Shape Events campaign',
                'overlayTitle' => 'Shape Events',
                'overlayTagline' => "CRAFTING\nUNFORGETTABLE\nEXPERIENCES",
                'overlaySoon' => 'VIEW PROJECT •••',
                'cta' => '#',
                'caseUrl' => null,
            ],
        ];
    }

    /** Case study — Avni Pure Masale (all real content from /case-study-avni). */
    public static function caseStudy(): array
    {
        return [
            'slug' => 'avni',
            'kicker' => 'Case Study — Brand Launch',
            'title' => 'Avni Pure Masale',
            'titleAccent' => 'Brand Launch Campaign',
            'sub' => 'Building a strong digital identity through strategic content, creative storytelling, and engaging social media campaigns.',
            'live' => self::INSTAGRAM,
            'overview' => [
                ['dt' => 'Client', 'dd' => 'Avni Pure Masale'],
                ['dt' => 'Industry', 'dd' => 'Food & Spices'],
                ['dt' => 'Duration', 'dd' => '3 Months'],
                ['dt' => 'Role', 'dd' => 'Social Media Marketing Executive'],
                ['dt' => 'Services', 'dd' => 'Content Strategy, Design, Reels, Social Media Management'],
                ['dt' => 'Tools', 'dd' => 'Canva, Photoshop, Meta Business Suite, CapCut, AI Tools'],
            ],
            'challenge' => 'Avni Pure Masale wanted to establish a strong online presence and increase brand awareness before launching its products. The brand had limited social media visibility, inconsistent content, and low audience engagement.',
            'goals' => [
                'Increase brand awareness',
                'Build an engaging Instagram profile',
                'Improve audience engagement',
                'Create a consistent brand identity',
                'Generate inquiries through social media',
                'Grow a loyal, repeat-buying community',
            ],
            'strategy' => [
                ['title' => 'Content Strategy', 'items' => ['Created monthly content calendar', 'Product-focused posts', 'Educational spice tips', 'Festival creatives', 'Trending reels']],
                ['title' => 'Brand Identity', 'items' => ['Designed consistent colour palette', 'Premium visual style', 'Brand-focused typography', 'Product storytelling']],
                ['title' => 'Engagement Strategy', 'items' => ['Interactive stories', 'Polls', 'Reels', 'User-focused captions', 'Hashtag research']],
            ],
            'process' => ['Research', 'Competitor Analysis', 'Content Planning', 'Graphic Design', 'Reel Editing', 'Scheduling', 'Performance Tracking', 'Optimisation'],
            'creatives' => [
                ['video' => '/videos/video-12.mp4', 'poster' => '/videos/video-12.jpg', 'caption' => 'Trending Reel'],
                ['video' => '/videos/video14.mp4', 'poster' => '/videos/video14.jpg', 'caption' => 'Campaign Reel'],
                ['video' => '/videos/video15.mp4', 'poster' => '/videos/video15.jpg', 'caption' => 'Product Reel'],
                ['video' => '/videos/video_17.mp4', 'poster' => '/videos/video_17.jpg', 'caption' => 'Brand Reel'],
                ['mock' => 'feed', 'caption' => 'Instagram Feed'],
                ['video' => '/videos/video-12.mp4', 'poster' => '/videos/video-12.jpg', 'caption' => 'Stories'],
                ['mock' => 'carousel', 'caption' => 'Carousel Posts'],
                ['video' => '/videos/ai-video-creative-1.mp4', 'poster' => '/videos/ai-video-creative-1.jpg', 'caption' => 'AI Video Creative 1'],
                ['video' => '/videos/ai-video-creative-2.mp4', 'poster' => '/videos/ai-video-creative-2.jpg', 'caption' => 'AI Video Creative 2'],
            ],
            'tools' => ['Canva', 'Photoshop', 'Meta Business Suite', 'CapCut', 'ChatGPT', 'Google Analytics', 'AI Tools'],
            'results' => [
                ['value' => '120K+', 'label' => 'Instagram Reach'],
                ['value' => '18K+', 'label' => 'Engagement'],
                ['value' => '9,800+', 'label' => 'Profile Visits'],
                ['value' => '+2,300', 'label' => 'Followers Growth'],
                ['value' => '180K+', 'label' => 'Reels Views'],
                ['value' => '85+', 'label' => 'Content Published'],
            ],
            'before' => ['Low engagement', 'Inconsistent branding', 'Few followers', 'Low reach'],
            'after' => ['Higher engagement', 'Consistent brand identity', 'Significant follower growth', 'Increased organic reach'],
            'learning' => 'This project strengthened my skills in content planning, audience analysis, creative storytelling, and performance optimisation. It demonstrated the importance of consistency, data-driven decisions, and trend-based content in building an engaged online community.',
            'quotes' => [
                [
                    'quote' => 'Priyanka helped us establish a professional and engaging social media presence. Her creativity, consistency, and strategic approach significantly improved our audience engagement.',
                    'stars' => 5,
                    'name' => 'Avni Pure Masale',
                    'role' => 'Client',
                ],
            ],
            'related' => [
                ['title' => 'Bundelii Campaign', 'sub' => 'Brand & Lifestyle', 'href' => '/#portfolio'],
                ['title' => 'Tripsdoc', 'sub' => 'Travel & Reels', 'href' => '/#portfolio'],
                ['title' => 'Shape Events', 'sub' => 'Events & Social', 'href' => '/#portfolio'],
            ],
        ];
    }

    /** Tools ecosystem (orbits). */
    public static function tools(): array
    {
        return [
            ['name' => 'Meta Business Suite', 'color' => '#0668E1', 'pct' => 90],
            ['name' => 'Meta Ads',           'color' => '#1877F2', 'pct' => 88],
            ['name' => 'Canva',              'color' => '#00C4CC', 'pct' => 95],
            ['name' => 'ManyChat',           'color' => '#31A2AC', 'pct' => 80],
            ['name' => 'Notion',             'color' => '#000000', 'pct' => 85],
            ['name' => 'Buffer',             'color' => '#231F20', 'pct' => 78],
            ['name' => 'Google Analytics',   'color' => '#F9AB00', 'pct' => 87],
            ['name' => 'CapCut',             'color' => '#000000', 'pct' => 99],
            ['name' => 'AI Video Tools',     'color' => '#8B5CF6', 'pct' => 82],
        ];
    }

    /** Brand colours for the tools orbit (legacy helper, kept for reference). */
    public static function toolColors(): array
    {
        return [
            '#0668E1', '#1877F2', '#00C4CC', '#31A2AC', '#000000',
            '#231F20', '#F9AB00', '#000000', '#8B5CF6',
        ];
    }

    /** Client testimonials (real, from reference). */
    public static function testimonials(): array
    {
        return [
            [
                'quote' => "Priyanka's approach to social media is both a smart and refreshing creative. She transformed our company's presence from a mere graphic into an expressive workflow. She widely is a strong design DM contact a kind ahead of the curve.",
                'name' => 'Sarah Mitra',
                'role' => 'Founder, BloomCo',
            ],
            [
                'quote' => 'Priyanka helped us establish a professional and engaging social media presence. Her creativity, consistency, and strategic approach significantly improved our audience engagement.',
                'name' => 'Avni Pure Masale',
                'role' => 'Client',
            ],
        ];
    }

    /** Brands marquee — all names verbatim from the reference. */
    public static function brands(): array
    {
        return [
            'Tripsdoc', 'vura_bau_chemie', 'Airmagicbysumera', 'Weshine',
            'Sitaram Wedding & Tours', 'Samlaun', 'Vault Circle', 'Baniababa Consultant',
            'Start-up Khata', 'Dhanmill',
        ];
    }

    /** Contact section. */
    public static function contact(): array
    {
        return [
            'eyebrow' => "LET'S CONNECT",
            'title' => 'Ready to Scale Your Brand?',
            'body' => 'Whether you\'re looking for a creative partner or a bold strategy or high-converting content, I\'m here to help you compose the digital landscape.',
            'channels' => [
                ['icon' => '✉', 'label' => 'Email', 'lines' => [self::EMAIL, self::EMAIL_ALT], 'href' => 'mailto:'.self::EMAIL],
                ['icon' => '📞', 'label' => 'Phone', 'lines' => [self::PHONE], 'href' => 'tel:+91'.self::PHONE],
                ['icon' => '📍', 'label' => 'Location', 'lines' => [self::LOCATION], 'href' => null],
            ],
            'formServices' => ['Social Media Management', 'Campaign Strategy', 'Brand Design'],
        ];
    }
}