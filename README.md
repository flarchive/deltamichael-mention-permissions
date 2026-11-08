# Mention Permissions

A Flarum 2 extension that lets administrators prevent selected groups from mentioning other users. Post and group mentions are not affected.

## Installation

After the package is published on Packagist, install it with:

```sh
composer require deltamichael/mention-permissions
php flarum extension:enable deltamichael-mention-permissions
php flarum cache:clear
```

## Usage

Open **Admin > Permissions** and grant **Cannot mention other users** to each group that should be restricted. Users in those groups can still mention posts and groups. Administrators are exempt.

When a restricted user types a user mention manually, it remains ordinary text and does not create a mention notification.

## Development

Build the admin and forum assets from the `js` directory:

```sh
npm install
npm run build
npm run check-typings
```

Commit the generated files in `js/dist` with source changes. Tag each Packagist release with a version such as `0.1.0`.