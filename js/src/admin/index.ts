import app from 'flarum/admin/app';

app.initializers.add('deltamichael-mention-permissions', () => {
  app.registry.for('deltamichael-mention-permissions').registerPermission(
    {
      icon: 'fas fa-user-slash',
      label: app.translator.trans('deltamichael-mention-permissions.admin.permissions.cannot_mention_users'),
      permission: 'mentionPermissions.cannotMentionUsers',
    },
    'start'
  );
});
