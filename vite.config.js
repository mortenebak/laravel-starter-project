import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import livewire from '@defstudio/vite-livewire-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
        livewire({  // <-- add livewire plugin
            refresh: ['resources/css/app.scss'],  // <-- will refresh css (tailwind ) as well
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                api: 'modern-compiler',
            }
        }
    }
})
