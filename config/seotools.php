<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),

    'meta' => [
        'defaults' => [
            'title'        => env('APP_NAME', 'Edugarden'),
            'titleBefore'  => true,
            'description'  => env('APP_DESCRIPTION', 'Edugarden - Nhà sách Cơ Đốc chuyên cung cấp tài liệu, sách đạo Tin Lành, Kinh Thánh và giáo trình học Kinh Thánh.'),
            'separator'    => ' - ',
            'keywords'     => explode(',', env('APP_KEYWORDS', 'sách cơ đốc,kinh thánh,giáo trình đạo tin lành,nhà sách cơ đốc,edugarden')),
            'canonical'    => null,
            'robots'       => env('APP_ROBOTS', 'index, follow'),
        ],

        'webmaster_tags' => [
            'google'    => env('SEO_GOOGLE_VERIFICATION'),
            'bing'      => env('SEO_BING_VERIFICATION'),
            'alexa'     => env('SEO_ALEXA_VERIFICATION'),
            'pinterest' => env('SEO_PINTEREST_VERIFICATION'),
            'yandex'    => env('SEO_YANDEX_VERIFICATION'),
            'norton'    => env('SEO_NORTON_VERIFICATION'),
        ],

        'add_notranslate_class' => false,
    ],

    'opengraph' => [
        'defaults' => [
            'title'       => env('APP_NAME', 'Edugarden') . ' - Nhà sách Cơ Đốc',
            'description' => env('APP_DESCRIPTION', 'Chuyên cung cấp sách đạo Tin Lành, Kinh Thánh, giáo trình và tài liệu học Kinh Thánh uy tín.'),
            'url'         => null,
            'type'        => 'website',
            'site_name'   => env('APP_NAME', 'Edugarden'),
            'images'      => [env('APP_OG_IMAGE', asset('images/edugarden-banner.jpg'))],
        ],
    ],

    'twitter' => [
        'defaults' => [
            'card' => 'summary_large_image',
            'site' => env('TWITTER_HANDLE', '@edugardenvn'),
        ],
    ],

    'json-ld' => [
        'defaults' => [
            'title'       => env('APP_NAME', 'Edugarden') . ' - Nhà sách Cơ Đốc',
            'description' => env('APP_DESCRIPTION', 'Chuyên sách đạo Tin Lành, Kinh Thánh và giáo trình học Kinh Thánh.'),
            'url'         => null,
            'type'        => 'WebPage',
            'images'      => [env('APP_OG_IMAGE', asset('images/edugarden-banner.jpg'))],
        ],
    ],
];
