<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        <url>
            <loc>{{ route('home') }}</loc>
            <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>1.0</priority>
        </url>
        <url>
            <loc>{{ route('contactPage') }}</loc>
            <lastmod>{{ $about->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
        <url>
            <loc>{{ route('categories') }}</loc>
            <lastmod>{{ $about->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
        @foreach ($categories as $category)
            <url>
                <loc>{{ route('category', $category->slug) }}</loc>
                <lastmod>{{ $category->updated_at->tz('UTC')->toAtomString() }}</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.9</priority>
            </url>
        @endforeach
        @foreach ($projects as $project)
            <url>
                <loc>{{ route('project', $project->id) }}</loc>
                <lastmod>{{ $project->updated_at->tz('UTC')->toAtomString() }}</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.8</priority>
            </url>
        @endforeach
</urlset>
