<?php
/* app/Helpers/helpers.php */

use Illuminate\Support\Facades\Vite;   // ← Intelephense now knows the class

if (! function_exists('logo_src_set')) {
    function logo_src_set(string $name): array
    {
        $sizes = [120, 240];
        $fmts  = ['avif', 'webp'];

        return collect($fmts)->mapWithKeys(fn ($fmt) => [
            $fmt => collect($sizes)->map(
                fn ($w) => Vite::asset("resources/images/{$name}.png?w={$w}&format={$fmt}") . " {$w}w"
            )->implode(', ')
        ])->all();
    }
}
