<h1>List of testimonials</h1>
<ul>
    {foreach from=$testimonials item=testimonial}
        <li><a href="{$testimonial.link}">{$testimonial.title} - {$testimonial.author}</a></li>
    {/foreach}
</ul>
