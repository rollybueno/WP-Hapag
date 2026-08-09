# Hapag

**Hapag** is a Filipino-inspired WordPress block theme designed for recipes, food creators, small businesses, and WooCommerce shops.

The theme takes its name from the Filipino word **hapag**, referring to the dining table — a place for food, sharing, and gathering.

## Repository Name

This GitHub repository is named `wp-hapag` for repository organization and naming purposes.

The actual WordPress theme name and directory must remain:

```text
hapag
```

Do not rename the theme directory to `wp-hapag`.

## Installation

Clone the repository into your WordPress themes directory while explicitly naming the destination directory `hapag`:

```bash
cd wp-content/themes
git clone git@github.com:rollybueno/wp-hapag.git hapag
```

Or using HTTPS:

```bash
cd wp-content/themes
git clone https://github.com/rollybueno/wp-hapag.git hapag
```

Your resulting directory structure should be:

```text
wp-content/
└── themes/
    └── hapag/
        ├── style.css
        ├── theme.json
        ├── templates/
        ├── parts/
        └── ...
```

Then activate **Hapag** from:

```text
Appearance → Themes
```

## Important

The repository name is:

```text
wp-hapag
```

The WordPress theme slug is:

```text
hapag
```

When cloning or creating a release package, always use `hapag` as the theme directory name.

For example, the distributable ZIP should contain:

```text
hapag/
```

and not:

```text
wp-hapag/
```

## Theme Goals

Hapag is built around a few core ideas:

* Full Site Editing and native WordPress blocks
* `theme.json`-first styling
* Minimal reliance on custom CSS
* No inline styling
* Recipe and editorial-friendly layouts
* WooCommerce support
* Accessible and responsive design
* Clean, warm, and food-focused visual language
* Patterns suitable for recipes, products, food makers, and small shops

## Development

Clone the repository:

```bash
git clone git@github.com:rollybueno/wp-hapag.git hapag
cd hapag
```

Make your changes, test them in WordPress, and commit them normally.

Although the local directory is named `hapag`, Git will continue using the `wp-hapag` repository as its remote.

You can verify this with:

```bash
git remote -v
```

## Requirements

* WordPress 6.6 or later
* PHP 7.4 or later
* WooCommerce recommended for shop functionality

## License

Hapag is licensed under the GNU General Public License v2 or later.

```text
https://www.gnu.org/licenses/gpl-2.0.html
```

## Credits

Hapag is inspired by Filipino food culture and the idea of the **hapag** — a table where food, stories, and people come together.
