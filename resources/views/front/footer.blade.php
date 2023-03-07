@if(!empty($customization->after_content_script))
    <div class="row p-3 m-3">
        {!! html_entity_decode($customization->after_content_script) !!}
    </div>
@endif
<footer>
    <div class="row">
        <p>{!! !empty($customization->footer_text) ? $customization->footer_text : '' !!}</p>
    </div>
    <script src="{{asset('js/script.js')}}"></script>
</footer>

</body>
</html>
