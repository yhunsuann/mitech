// schema.js

var schemaData = {
    "@context": "https://schema.org",
    "@graph": [{
        "@type": "WebPage",
        "@id": "https://zeitgypsum.com/",
        "url": "https://zeitgypsum.com/",
        "name": "MiTech - Thạch cao đến từ Hàn Quốc | MiTech Việt Nam",
        "isPartOf": {
            "@id": "https://zeitgypsum.com/#website"
        },
        "about": {
            "@id": "https://zeitgypsum.com/#organization"
        },
        "datePublished": "2022-02-12T13:30:44+00:00",
        "dateModified": "2023-07-03T09:31:49+00:00",
        "description": "MiTech tự hào là nhà phân phối tấm thạch cao hàng đầu đến từ Hàn Quốc. MiTech mang đến giải pháp thạch cao và thi công thông minh",
        "breadcrumb": {
            "@id": "https://zeitgypsum.com/#breadcrumb"
        },
        "inLanguage": "vi-VN",
        "potentialAction": [{
            "@type": "ReadAction",
            "target": ["https://zeitgypsum.com/"]
        }]
    }, {
        "@type": "BreadcrumbList",
        "@id": "https://zeitgypsum.com/#breadcrumb",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Home"
        }]
    }, {
        "@type": "WebSite",
        "@id": "https://zeitgypsum.com/#website",
        "url": "https://zeitgypsum.com/",
        "name": "MiTech",
        "description": "Korean Gypsum - Tailored for you",
        "publisher": {
            "@id": "https://zeitgypsum.com/#organization"
        },
        "potentialAction": [{
            "@type": "SearchAction",
            "target": {
                "@type": "EntryPoint",
                "urlTemplate": "https://zeitgypsum.com/?s={search_term_string}"
            },
            "query-input": "required name=search_term_string"
        }],
        "inLanguage": "vi-VN"
    }, {
        "@type": "Organization",
        "@id": "https://zeitgypsum.com/#organization",
        "name": "MiTech",
        "url": "https://zeitgypsum.com/",
        "sameAs": ["https://www.facebook.com/ThachcaoZeit/"],
        "logo": {
            "@type": "ImageObject",
            "inLanguage": "vi-VN",
            "@id": "https://zeitgypsum.com/#/schema/logo/image/",
            "url": "https://zeitgypsum.com/wp-content/uploads/2022/03/cropped-favico-1.png",
            "contentUrl": "https://zeitgypsum.com/wp-content/uploads/2022/03/cropped-favico-1.png",
            "width": 512,
            "height": 512,
            "caption": "MiTech"
        },
        "image": {
            "@id": "https://zeitgypsum.com/#/schema/logo/image/"
        }
    }]
};