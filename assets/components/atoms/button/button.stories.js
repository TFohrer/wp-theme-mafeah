export default {
    title: 'Atom/Button',
    argTypes: {
        title: { control: 'text' },
        class: { control: { disable: true } },
        outlined: { control: 'boolean' },
    },
}

//import { text } from '@storybook/addon-knobs'
import template from './button.twig'

export const Primary = args => template({ ...args })

Primary.args = {
    title: 'Primary Button',
    class: 'button--primary',
}

export const Secondary = args => template({ ...args })

Secondary.args = {
    title: 'Secondary Button',
    class: 'button--secondary',
}
