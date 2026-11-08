<?php

/*
 * This file is part of deltamichael/mention-permissions.
 */

namespace DeltaMichael\MentionPermissions;

use Flarum\Api\Context;
use Flarum\Api\Resource;
use Flarum\Api\Schema;
use Flarum\Extend;
use Flarum\User\User;

return [
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js'),

    new Extend\Locales(__DIR__.'/locale'),

    (new Extend\ApiResource(Resource\UserResource::class))
        ->fields(fn () => [
            Schema\Boolean::make('canMentionUsers')
                ->visible(fn (User $user, Context $context) => $context->getActor()->is($user))
                ->get(fn (User $user) => $user->isAdmin() || ! $user->hasPermission('mentionPermissions.cannotMentionUsers')),
        ]),

    (new Extend\Formatter())
        ->configure(Formatter\RestrictUserMentions::class),
];