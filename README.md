# Prompt

Prompt is a simple Laravel package for managing your AI prompts in Markdown files, with the full power of Blade.

## Installation

You can install the package via composer:

```bash
composer require chimit/prompt
```

## Usage

### Create Your Prompts

Create your prompt files in the `resources/prompts` directory using the `.md` extension. You can organize them in subdirectories as needed:

```
resources/
└── prompts/
    ├── seo/
    │   └── product-meta.md
    └── welcome.md
```

### Use Blade Syntax in Your Prompts

Your prompt files support full Blade syntax, including variables, PHP expressions, and unsafe HTML rendering. Here's an example `resources/prompts/seo/product-meta.md`:

```markdown
You are an SEO expert specializing in e-commerce. Generate a compelling meta description for this product.

**Product:** {{ $product->name }}
**Price:** ${{ number_format($product->price, 2) }}

**Product Description:**
---
{!! $product->description !!}
---

@if($product->discount_percentage > 0)
**Special Offer:** {{ $product->discount_percentage }}% OFF - Limited Time!
@endif

Requirements:
- Maximum 160 characters
- Include the product name and key benefits
- Create urgency if there's a discount
- Target keywords: {{ implode(', ', $keywords) }}
```

### Render Your Prompts

Use the `Prompt::get()` method to render your prompts with data, just like you would with Blade views:

```php
use Chimit\Prompt;

$prompt = Prompt::get('seo/product-meta', [
    'product' => $product,
    'keywords' => ['wireless headphones', 'bluetooth', 'noise cancelling']
]);
```
