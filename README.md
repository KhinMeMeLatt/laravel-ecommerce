## Laravel Ecommerce
The original repository can be found [here](https://github.com/drehimself/laravel-ecommerce-example).

## Installation

### Stripe (For Payment)
Add stripe key in .env file (You can get the below keys in [strip](https://stripe.com/))

```
STRIPE_KEY="YOUR_STRIPE_KEY"
STRIPE_SECRET="YOUR_STRIPE_SECRET"
```

### Mailtrap (For Forget Email)
Add MAIL_MAILER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD and MAIL_ENCRYPTION in .env file (Get Username & password from [mailtrap](https://mailtrap.io/inboxes))

## Shopping Cart Package

- [ hardevine/LaravelShoppingcart ](https://github.com/hardevine/LaravelShoppingcart) is used for shopping cart
- Tax rate and format can be changed in config>cart.php.

## Transactional Email
Set Email Address and name in .env file.

```
MAIL_FROM_ADDRESS = YOUR_EMAIL_ADDRESS
MAIL_FROM_NAME = YOUR_EMAIL_NAME
```

## Algolia (Searching API)

Algolia Vue Instant Search and Autocomplete are used in this project. Please setup algolia attributes in env file as below. The attributes' values can be get from [ Algolia ](https://www.algolia.com/).

```
MIX_ALGOLIA_APP_ID=YOUR_ALGOLIA_APP_ID
MIX_ALGOLIA_SECRET=YOUR_ALGOLIA_SECRET
MIX_ALGOLIA_API_KEY=YOUR_ALGOLIA_API_KEY
```

## Build with
- [Laravel](https://laravel.com/docs/8.x) 
- Shopping Cart - [hardevine/LaravelShoppingcart](https://github.com/hardevine/LaravelShoppingcart)
- Admin Panel - [Voyager](https://voyager.devdojo.com/)
- Payment - [Stripe Documentation](https://stripe.com/docs/stripe-js)
- 