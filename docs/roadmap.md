# Version plan

Hapag 1.0.0 is the first directory release: a block theme for recipes, food writing, and small shops. This note is the backlog for versions after that. It is a planning document, not a release commitment. `docs/` is excluded from `tools/zip.php`, so this file stays in the repository and out of the theme package.

Versions follow the theme header:

- **1.0.x** — review feedback and bug fixes. No new visitor-facing features.
- **1.x** — improvements that stay inside a block theme and do not require a plugin.
- **2.0** — only if the public setup changes, for example optional shop templates.

## What 1.0.0 already includes

Leave these alone unless a bug shows up:

- `theme.json` design system, local DM Sans and League Spartan, and the thin `theme.css` layer.
- Front page, blog home, archive, single, page, full-width page, index, and 404 templates.
- Header, footer, and the registered patterns (hero, ticker, query grid, journal split, recipe, content rail, CTAs, statements).
- Cook-time badge from `hapag_cook_time`, reading time, heading anchors, and the content rail.
- Archive queries fixed at 6 posts. That count stays. It is a presentation choice, not a later cleanup item.

## 1.0.x — directory follow-through

Ship these only if a reviewer asks, or as a quiet patch before the next feature release. Several were kept in 1.0.0 on purpose.

| Item | Why it is open | Change |
|---|---|---|
| `custom-logo` | The tag is present. The header and footer use Site Title only. | Add a Site Logo block beside the title and `add_theme_support( 'custom-logo' )`. If that design is rejected, drop the tag instead. |
| `threaded-comments` | Pages have comments. Single posts do not. Nested comments are visually flattened. | Add the comments pattern to `templates/single.html` and let nested replies indent. |
| Translations | PHP strings use the `hapag` text domain. HTML templates and the empty `languages/` folder are not translated. The `translation-ready` tag was removed to keep the tag list at three. | Generate a `.pot`, translate the PHP catalog, and move user-facing template copy into PHP patterns where it is still hard-coded English. Add the tag back only when a language file ships. |
| Placeholder links | Header, footer, and several patterns point at `https://example.com`. Footer social links point at `#`. Journal links point at `#stories`. | Point each control at a real, editable navigation item. Social links should be removed until the site owner has URLs, rather than shipped as dead hashes. |
| Comment title wording | `hapag_render_comments_title()` replaces English words in rendered HTML. | Use the Comments Title block settings, or a translatable filter that does not depend on English source text. |
| Recipe markup | `patterns/recipe.php` stores ingredients and steps in Custom HTML. | Rebuild that pattern with core blocks in 1.1. A 1.0.x patch should only fix it if Theme Check flags the Custom HTML. |

## 1.1 — a finished site without demo code

Goal: a new install looks like Hapag after the owner sets the front page, the posts page, and the menu. The theme should not write sample posts.

- Starter pages documented in `readme.txt`: a static front page, a Recipes posts page, and an Our table page. Navigation in `parts/header.html` and `parts/footer.html` should reference those pages instead of hard-coded paths.
- One editable Order link, stored where the Site Editor already keeps navigation, and reused by the header button, the footer order link, and the order CTAs in `display-hero`, `split-media`, and `cta-band-dual-action`.
- Homepage newsletter section from the HTML prototype (`HTML/index.html`, “Stay for seconds”). The pattern is a heading, short copy, and a prompt to insert a form block. Do not bundle a form plugin or a custom `<form>`.
- `templates/search.html`, reusing the archive header and query grid.
- Related posts on single views query the current post’s categories, still excluding the current post.

## 1.2 — recipes as structured content

Goal: a recipe is content the editor can change and a search engine can read. Still no custom post type and no custom block. Both belong in a plugin.

- Replace the Custom HTML in `patterns/recipe.php` with headings, paragraphs, a list for ingredients, and an ordered list for steps.
- Keep prep, cook, and servings as visible text in the recipe header, and keep `hapag_cook_time` as the single meta value the card badge reads. Document the meta key in `readme.txt`.
- Print a `schema.org/Recipe` JSON-LD script from that same visible structure: name, description, image, prep time, cook time, yield, ingredients, and instructions. Skip the script when the post has no `hapag-recipe` group.
- Add a print stylesheet so a recipe page prints the title, facts, ingredients, and steps without the ticker, order buttons, or footer wordmark.

## 1.3 — language, motion, and editor fit

- Filipino (`fil`) as the first translation, since the theme is named and written for that table.
- Respect `prefers-reduced-motion` on the topic ticker. The words stay readable when animation is off.
- Move any layout in `theme.css` that `theme.json` can now express into `theme.json`, and leave CSS for the collage, ticker, sticker, and card badge.
- Offer one alternate color style variation only if it can be done with the existing palette. Do not add a second visual identity.

## 2.0 — shop templates, only after they exist

WooCommerce was removed from the 1.0.0 description and tags because the theme does not integrate with it. A later major version can add block templates that load only when WooCommerce is active:

- `archive-product.html`, `single-product.html`, and the cart and checkout templates, styled with the existing palette.
- No payment code, no custom checkout fields, and no requirement to install WooCommerce.
- The `e-commerce` tag and any shop sentence in `style.css` or `readme.txt` wait until those templates are in the zip.

## Out of scope

These conflict with the theme directory rules or with decisions already made for 1.0.0:

- A recipe custom post type, custom blocks, or shortcodes.
- Share buttons and other plugin features rebuilt inside the theme.
- Injecting a sample recipe into posts that do not contain one.
- Remote font requests. DM Sans and League Spartan stay bundled.
- Changing the six-post archive count.
- Bundling WooCommerce, a form plugin, or a newsletter service.

## Suggested sequence

1. Clear any 1.0.x review notes before starting 1.1.
2. 1.1 next, because placeholder links and the missing search template are what a new site owner hits first.
3. 1.2 after that. Structured recipes are the theme’s main content type.
4. 1.3 can overlap with 1.2 once the recipe copy is in translatable blocks.
5. 2.0 only when there is a real shop design to support. It is not required for the theme to be complete.
