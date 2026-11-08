import app from 'flarum/forum/app';
import { extend } from 'flarum/common/extend';

app.initializers.add('deltamichael-mention-permissions', () => {
  const userMention = app.mentionFormats.mentionable('user');

  if (!userMention) return;

  extend(userMention, 'enabled', function (enabled) {
    return enabled && app.session.user?.attribute('canMentionUsers') !== false;
  });
});
