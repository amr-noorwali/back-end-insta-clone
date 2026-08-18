hasMany()       // One-to-Many
belongsTo()     // Many-to-One
belongsToMany() // Many-to-Many
hasOne()        // One-to-One


## موضوع للمراجعة لاحقًا: Eloquent Relationship Loading


أريد أن أفهم كيف يحمّل Laravel علاقات الـModels باستخدام Eloquent ORM، وبالتحديد:


- ما وظيفة `load()`؟
- ما الفرق بين `load()` و`with()`؟
- ما الفرق بين Eager Loading وLazy Loading؟
- كيف يعرف Laravel أن `'user'` في `$comment->load('user')` تشير إلى دالة العلاقة `user()` داخل `Comment Model`؟
- متى أستخدم:


  ```php
  Comment::with('user')->get();

ومتى أستخدم:

$comment->load('user');
ما مشكلة N+1 Query؟ وكيف يمنعها with()؟

ما الفرق بين:

$comment->user;
$comment->load('user');
$comment->loadMissing('user');