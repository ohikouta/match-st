import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0',  // Docker 環境でホストマシンからアクセス可能にする
        port: 5173,       // Vite の開発用ポートを明示的に指定
        watch: {
            usePolling: true,  // Docker 環境でファイル変更を正しく検出
        },
        hmr: {
            host: 'localhost',  // HMR（ホットモジュールリプレースメント）のホストを設定
            protocol: 'ws',    // WebSocket プロトコルを使用
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
