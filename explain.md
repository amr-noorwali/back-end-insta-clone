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




## Comments System

تم تنفيذ نظام التعليقات، ويتيح للمستخدم المسجل:

- عرض تعليقات منشور مع Pagination.
- إضافة تعليق إلى منشور.
- حذف تعليقاته فقط.
- منع حذف تعليقات المستخدمين الآخرين باستخدام `CommentPolicy`.
- تنظيم بيانات الاستجابة باستخدام `CommentResource`.

### Endpoints

- `GET /api/posts/{post}/comments`
- `POST /api/posts/{post}/comments`
- `DELETE /api/comments/{comment}`

### Validation & Security

- محتوى التعليق مطلوب، وبحد أقصى `1000` حرف.
- الطلب دون Token يرجع `401`.
- المنشور أو التعليق غير الموجود يرجع `404`.
- البيانات غير الصحيحة ترجع `422`.
- محاولة حذف تعليق مستخدم آخر ترجع `403`.