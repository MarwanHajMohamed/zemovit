<?php

namespace App\Helpers;

class SvgHelper
{
    private static $svgs = [
        'one'   => '<i class="far fa-chart-line icon"></i>',
        'two'   => '<i class="far fa-vector-square icon"></i>',
        'three' => '<i class="far fa-calendar-week icon"></i>',
        'four'  => '<i class="far fa-broadcast-tower icon"></i>',
//
//        'hospital'           => '<i class="far fa-hospital icon"></i>',
//        'heartbeat'          => '<i class="far fa-heartbeat icon"></i>',
//        'stethoscope'        => '<i class="far fa-stethoscope icon"></i>',
//        'capsules'           => '<i class="far fa-capsules icon"></i>',
//        'syringe'            => '<i class="far fa-syringe icon"></i>',
//        'briefcase-medical'  => '<i class="far fa-briefcase-medical icon"></i>',
//        'notes-medical'      => '<i class="far fa-notes-medical icon"></i>',
//        'x-ray'              => '<i class="far fa-x-ray icon"></i>',
//        'thermometer'        => '<i class="far fa-thermometer-half icon"></i>',
//        'dna'                => '<i class="far fa-dna icon"></i>',
//        'microscope'         => '<i class="far fa-microscope icon"></i>',
//        'ambulance'          => '<i class="far fa-ambulance icon"></i>',

        // General icons
        'alarm'              => '<i class="far fa-bell icon"></i>',
        'archive'            => '<i class="far fa-archive icon"></i>',
        'award'              => '<i class="far fa-award icon"></i>',
        'bag'                => '<i class="far fa-shopping-bag icon"></i>',
        'bell'               => '<i class="far fa-bell icon"></i>',
        'bookmark'           => '<i class="far fa-bookmark icon"></i>',
        'box'                => '<i class="far fa-box icon"></i>',
        'briefcase'          => '<i class="far fa-briefcase icon"></i>',
        'calendar'           => '<i class="far fa-calendar-alt icon"></i>',
        'camera'             => '<i class="far fa-camera icon"></i>',
        'chat'               => '<i class="far fa-comments icon"></i>',
        'check-circle'       => '<i class="far fa-check-circle icon"></i>',
        'clipboard'          => '<i class="far fa-clipboard icon"></i>',
        'cloud'              => '<i class="far fa-cloud icon"></i>',
        'code'               => '<i class="far fa-code icon"></i>',
        'compass'            => '<i class="far fa-compass icon"></i>',
        'cpu'                => '<i class="far fa-microchip icon"></i>',
        'database'           => '<i class="far fa-database icon"></i>',
        'download'           => '<i class="far fa-download icon"></i>',
        'envelope'           => '<i class="far fa-envelope icon"></i>',
        'file-earmark'       => '<i class="far fa-file icon"></i>',
        'flag'               => '<i class="far fa-flag icon"></i>',
        'gear'               => '<i class="far fa-cog icon"></i>',
        'globe'              => '<i class="far fa-globe icon"></i>',
        'graph-up'           => '<i class="far fa-chart-line icon"></i>',
        'grid'               => '<i class="far fa-th icon"></i>',
        'heart'              => '<i class="far fa-heart icon"></i>',
        'house'              => '<i class="far fa-home icon"></i>',
        'image'              => '<i class="far fa-image icon"></i>',
        'inbox'              => '<i class="far fa-inbox icon"></i>',
        'info-circle'        => '<i class="far fa-info-circle icon"></i>',
        'key'                => '<i class="far fa-key icon"></i>',
        'layers'             => '<i class="far fa-layer-group icon"></i>',
        'lightning'          => '<i class="far fa-bolt icon"></i>',
        'link'               => '<i class="far fa-link icon"></i>',
        'lock'               => '<i class="far fa-lock icon"></i>',
        'map'                => '<i class="far fa-map icon"></i>',
        'moon'               => '<i class="far fa-moon icon"></i>',
        'music-note'         => '<i class="far fa-music icon"></i>',
        'pen'                => '<i class="far fa-pen icon"></i>',
        'person'             => '<i class="far fa-user icon"></i>',
        'phone'              => '<i class="far fa-phone icon"></i>',
        'printer'            => '<i class="far fa-print icon"></i>',
        'rocket'             => '<i class="far fa-rocket icon"></i>',
        'search'             => '<i class="far fa-search icon"></i>',
        'shield'             => '<i class="far fa-shield-alt icon"></i>',
        'star'               => '<i class="far fa-star icon"></i>',
        'sun'                => '<i class="far fa-sun icon"></i>',
        'trash'              => '<i class="far fa-trash icon"></i>',
        'upload'             => '<i class="far fa-upload icon"></i>',
        'wallet'             => '<i class="far fa-wallet icon"></i>',
        'wifi'               => '<i class="far fa-wifi icon"></i>',
           // New health-related icons
//    'ambulance-fill'     => '<i class="far fa-ambulance icon"></i>',
//    'band-aid'           => '<i class="far fa-band-aid icon"></i>',
//    'clinic'             => '<i class="far fa-clinic-medical icon"></i>',
//    'hospital-alt'       => '<i class="far fa-hospital-alt icon"></i>',
//    'prescription'       => '<i class="far fa-prescription-bottle-alt icon"></i>',
//    'tooth'              => '<i class="far fa-tooth icon"></i>',
//    'user-md'            => '<i class="far fa-user-md icon"></i>',
//    'wheelchair'         => '<i class="far fa-wheelchair icon"></i>',

    // General icons
    'address-book'       => '<i class="far fa-address-book icon"></i>',
    'address-card'       => '<i class="far fa-address-card icon"></i>',
    'angle-double-left'  => '<i class="far fa-angle-double-left icon"></i>',
    'angle-double-right' => '<i class="far fa-angle-double-right icon"></i>',
    'camera-retro'       => '<i class="far fa-camera-retro icon"></i>',
    'cogs'               => '<i class="far fa-cogs icon"></i>',
    'comment-dots'       => '<i class="far fa-comment-dots icon"></i>',
    'envelope-open'      => '<i class="far fa-envelope-open icon"></i>',
    'file-alt'           => '<i class="far fa-file-alt icon"></i>',
    'flag-alt'           => '<i class="far fa-flag-alt icon"></i>',
    'flask'              => '<i class="far fa-flask icon"></i>',
    'folder'             => '<i class="far fa-folder icon"></i>',
    'folder-open'        => '<i class="far fa-folder-open icon"></i>',
    'keyboard'           => '<i class="far fa-keyboard icon"></i>',
    'laptop-code'        => '<i class="far fa-laptop-code icon"></i>',
    'microphone-alt'     => '<i class="far fa-microphone-alt icon"></i>',
    'money-bill-wave'    => '<i class="far fa-money-bill-wave icon"></i>',
    'mountain'           => '<i class="far fa-mountain icon"></i>',
    'newspaper'          => '<i class="far fa-newspaper icon"></i>',
    'paint-brush'        => '<i class="far fa-paint-brush icon"></i>',
    'plug'               => '<i class="far fa-plug icon"></i>',
    'poll'               => '<i class="far fa-poll icon"></i>',
    'shapes'             => '<i class="far fa-shapes icon"></i>',
    'shield-check'       => '<i class="far fa-shield-check icon"></i>',
    'sync-alt'           => '<i class="far fa-sync-alt icon"></i>',
    'thermometer-empty'  => '<i class="far fa-thermometer-empty icon"></i>',
    'toolbox'            => '<i class="far fa-toolbox icon"></i>',
    'user-secret'        => '<i class="far fa-user-secret icon"></i>',
    'wrench'             => '<i class="far fa-wrench icon"></i>',
    'zap'                => '<i class="far fa-zap icon"></i>',
    'wifi-slash'         => '<i class="far fa-wifi-slash icon"></i>',
    'lightbulb'         => '<i class="far fa-lightbulb icon"></i>',
    'handshake'         => '<i class="far fa-handshake icon"></i>',

    // Social Media icons
    'facebook-f'         => '<i class="far fa-facebook-f icon"></i>',
    'twitter'            => '<i class="far fa-twitter icon"></i>',
    'linkedin-in'        => '<i class="far fa-linkedin-in icon"></i>',
    'instagram'          => '<i class="far fa-instagram icon"></i>',
    'youtube'            => '<i class="far fa-youtube icon"></i>',
    'tiktok'             => '<i class="far fa-tiktok icon"></i>',
    'whatsapp'           => '<i class="far fa-whatsapp icon"></i>',
    'telegram'           => '<i class="far fa-telegram icon"></i>',
        // Additional icons
        'airplane'           => '<i class="far fa-plane icon"></i>',
        'apple-alt'          => '<i class="far fa-apple-alt icon"></i>',
        'battery-full'       => '<i class="far fa-battery-full icon"></i>',
        'beer'               => '<i class="far fa-beer icon"></i>',
        'bicycle'            => '<i class="far fa-bicycle icon"></i>',
        'cloud-moon'         => '<i class="far fa-cloud-moon icon"></i>',
        'coffee'             => '<i class="far fa-coffee icon"></i>',
        'coin'               => '<i class="far fa-coin icon"></i>',
        'couch'              => '<i class="far fa-couch icon"></i>',
        'cloud-sun'          => '<i class="far fa-cloud-sun icon"></i>',
        'car'                => '<i class="far fa-car icon"></i>',
        'calculator'         => '<i class="far fa-calculator icon"></i>',
        'dog'                => '<i class="far fa-dog icon"></i>',
        'mountain'           => '<i class="far fa-mountain icon"></i>',
        'subway'             => '<i class="far fa-subway icon"></i>',
    ];

    public static function generateSvgOptions()
    {
        $svgs = self::$svgs;

        $options = '';
        foreach ($svgs as $key => $svg) {
            $options .= sprintf(
                '<option value="%s" data-svg="%s">%s</option>',
                htmlspecialchars($key),
                htmlspecialchars($svg), // تخزين SVG كـ data attribute
                $key
            );
        }

        return $options;
    }

    public static function generateSvgRadioButtons($name, $selectedValue = null)
    {
        $svgs = self::$svgs;

        $radios = '';
        foreach ($svgs as $key => $svg) {
            $isChecked = $key === $selectedValue ? 'checked' : '';
            $radios .= sprintf(
                '<div class="form-check form-check-inline customIcons">
                    <input class="form-check-input" type="radio" name="%s" id="svg_%s" value="%s" %s>
                    <label class="form-check-label d-flex align-items-center" style="width: 40px; height: 40px;" for="svg_%s">%s</label>
                </div>',
                htmlspecialchars($name),
                htmlspecialchars($key),
                htmlspecialchars($key),
                $isChecked,
                htmlspecialchars($key),
                $svg
            );
        }

        return $radios;
    }

    public static function getSvgByKey($key)
    {
        return self::$svgs[$key] ?? '';
    }
}
