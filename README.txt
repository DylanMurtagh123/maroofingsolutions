# MA Roofing Solutions - SEO / Backend Files

Upload these files to the root of the website, next to `index.html`.

## Files included

- `sitemap.xml` - lists the website pages for Google/Bing.
- `robots.txt` - tells search engines they can crawl the site and where the sitemap is.
- `.htaccess` - Apache hosting helper for HTTPS redirects, non-www canonical redirect, security headers, caching and compression.
- `_headers` - optional security headers file for hosts that support it, such as Netlify-style hosting.

## Important

Use either `.htaccess` or `_headers` depending on your hosting platform. If your host is standard cPanel/Apache hosting, use `.htaccess`.

After uploading `sitemap.xml`, submit this URL in Google Search Console:

https://maroofingsolutions.co.uk/sitemap.xml

The sitemap was built from the internal links found in your uploaded homepage and roof repairs page.
