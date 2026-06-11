<?php

namespace App\Enums;

enum AcquisitionSource: string
{
    case SEARCH_LINKEDIN = 'search_linkedin';
    case SEARCH_GOOGLE = 'search_google';
    case SEARCH_INSTAGRAM = 'search_instagram';
    case SEARCH_X = 'search_x';
    case SEARCH_FACEBOOK = 'search_facebook';
    case SEARCH_THREAD = 'search_thread';
    case SEARCH_BLUESKY = 'search_bluesky';

    case ORGANIC_WEBSITE = 'organic_website';
    case ORGANIC_BLOG = 'organic_blog';
    case ORGANIC_FACEBOOK = 'organic_facebook';
    case ORGANIC_INSTAGRAM = 'organic_instagram';
    case ORGANIC_REDDIT = 'organic_reddit';
    case ORGANIC_X = 'organic_x';
    case ORGANIC_THREAD = 'organic_thread';
    case ORGANIC_BLUESKY = 'organic_bluesky';

    case ADS_GOOGLE = 'ads_google';
    case ADS_FACEBOOK = 'ads_facebook';
    case ADS_INSTAGRAM = 'ads_instagram';
    case ADS_REDDIT = 'ads_reddit';

    case SPONSORSHIP_INFLUENCER = 'sponsorship_influencer';

    case OTHER_WORD_OF_MOUTH = 'other_word_of_mouth';
    case OTHER_COLD_CONTACT = 'other_cold_contact';

    public function category(): string
    {
        return match ($this) {
            self::SEARCH_LINKEDIN,
            self::SEARCH_GOOGLE,
            self::SEARCH_INSTAGRAM,
            self::SEARCH_X,
            self::SEARCH_FACEBOOK,
            self::SEARCH_THREAD,
            self::SEARCH_BLUESKY => 'direct_search',

            self::ORGANIC_WEBSITE,
            self::ORGANIC_BLOG,
            self::ORGANIC_FACEBOOK,
            self::ORGANIC_INSTAGRAM,
            self::ORGANIC_REDDIT,
            self::ORGANIC_X,
            self::ORGANIC_THREAD,
            self::ORGANIC_BLUESKY => 'organic',

            self::ADS_GOOGLE,
            self::ADS_FACEBOOK,
            self::ADS_INSTAGRAM,
            self::ADS_REDDIT => 'ads',

            self::SPONSORSHIP_INFLUENCER => 'sponsorship',

            self::OTHER_WORD_OF_MOUTH,
            self::OTHER_COLD_CONTACT => 'other',
        };
    }

    public static function grouped(): array
    {
        $grouped = [];
        foreach (self::cases() as $case) {
            $category = $case->category();
            if (!isset($grouped[$category])) {
                $grouped[$category] = [];
            }
            $grouped[$category][] = $case;
        }
        return $grouped;
    }
}
