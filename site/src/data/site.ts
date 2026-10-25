export const REG_NUMBER = 'BE 1016.223.072';
export const EMAIL = 'info@bsaab.com';
export const FACEBOOK_URL = 'https://www.facebook.com/groups/1199471344702491';
export const CBE_URL = 'https://kbopub.economie.fgov.be/';

export const nav = [
  { href: '#about', label: 'About' },
  { href: '#goals', label: 'Goals' },
  { href: '#leadership', label: 'Leadership' },
  { href: '#join', label: 'Membership' },
  { href: '#contact', label: 'Contact' },
];

export const cities = ['Brussels', 'Ghent', 'Leuven', 'Antwerp', 'Liège', 'Mechelen'];

export const registration = [
  { label: 'Status', value: 'Active, normal legal situation' },
  { label: 'Legal form', value: 'Non-profit organisation' },
  { label: 'Registered since', value: '14 November 2024' },
  { label: 'Registered seat', value: 'Ixelles, Brussels' },
];

export const goals = [
  'Foster a sense of community between existing students, alumni and the wider community.',
  'Bring students from diverse universities and institutions together to build unity between Bangladeshi, Bangladeshi-Belgian and international youth.',
  'Support the academic, professional and personal development of members.',
  'Create awareness of Belgian culture, language and history.',
  'Establish and maintain strong relationships with the local community.',
  'Create opportunities for networking, mentorship and career advancement.',
  'Represent the diverse Bangladeshi youth population through interaction, participation and activism.',
  'Organise events, programmes and activities that benefit students, alumni and the community.',
  'Hold occasional get-togethers so current and former students stay connected.',
  "Help members know each other's whereabouts, positions and workplaces to open doors for cooperation.",
  'Run workshops that refresh and update knowledge for students and alumni.',
  'Enhance the image of Bangladesh and its community in Belgium and abroad.',
  'Promote awareness of Bangladeshi culture, language and history.',
  'Serve people in distress.',
  'Develop leadership among existing and former students in Belgium.',
  'Create social services that uplift the moral standard of students and alumni.',
  'Honour alumni for their outstanding contributions.',
];

export const activities = [
  { icon: 'database', title: 'Member database', text: 'Keep records of current and former students up to date, and recruit new members every semester.' },
  { icon: 'megaphone', title: 'Meetings & notices', text: 'Regular meetings, special meetings and an Annual General Meeting, with notices shared by email, Facebook and messaging.' },
  { icon: 'users', title: 'Get-togethers', text: 'Annual reunions, games, picnics and cultural programmes that keep the community close.' },
  { icon: 'briefcase', title: 'Career support', text: 'Guidance on Belgian and international job opportunities, networking and mentorship.' },
  { icon: 'link', title: 'Community links', text: 'Working with Belgian-Bangladeshi and international communities, universities and institutions.' },
  { icon: 'heart', title: 'Welfare', text: "A Social Welfare team that supports members' well-being and builds positive relationships." },
] as const;

export const advisory = [
  'The Honourable Ambassador, Embassy of Bangladesh in Belgium',
  'Senior citizens residing in Belgium',
  'Educationalists: professors, faculty, doctors, engineers and lawyers',
  'Senior community members',
];

export const membershipTypes = [
  { icon: 'graduation', title: 'Student Members', text: 'Existing Bangladeshi students in Belgium.', voting: true },
  { icon: 'users', title: 'Alumni Members', text: 'Graduates and former students in Belgium.', voting: true },
  { icon: 'star', title: 'Honorary Members', text: 'Individuals awarded honorary status by the Association.', voting: false },
] as const;

export const statuses = [
  { value: 'student', label: 'Current student' },
  { value: 'alumni', label: 'Alumnus / former student' },
  { value: 'honorary', label: 'Supporter / honorary' },
];
