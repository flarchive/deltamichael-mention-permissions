<?php

namespace DeltaMichael\MentionPermissions\Formatter;

use Flarum\User\User;
use s9e\TextFormatter\Configurator;
use s9e\TextFormatter\Parser\Tag;

class RestrictUserMentions
{
    public function __invoke(Configurator $configurator): void
    {
        if (! $configurator->tags->exists('USERMENTION')) {
            return;
        }

        $configurator->tags->get('USERMENTION')->filterChain
            ->prepend([self::class, 'invalidateRestrictedMention'])
            ->addParameterByName('actor');
    }

    public static function invalidateRestrictedMention(Tag $tag, ?User $actor): ?bool
    {
        if ($actor !== null && ! $actor->isAdmin() && $actor->hasPermission('mentionPermissions.cannotMentionUsers')) {
            $tag->invalidate();

            return false;
        }

        return null;
    }
}