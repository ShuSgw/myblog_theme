import $ from "jquery";

export default function () {
    console.log('this is from sample.js outside of jquery')

    $(".sample").on("click", function () {
        console.log("hello jquery");
    });
    
    console.log('this is from sample.js inside of jquery');
};