module.exports = {
    theme: {
        extend: {
            spacing: {
                '72': '18rem',
                '84': '21rem',
                '100': '30rem',
            },

            borderRadius: {
                'xl': '.7rem'
            }
        },
    },
    variants: {
        outline: ["focus", "responsive", "hover"]
    },
    plugins: [],

    corePlugins: {
        transitionProperty: true
    }
};
