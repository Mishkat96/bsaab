import type { ImageMetadata } from 'astro';
import ekram from '../assets/team/ekram-hossain.jpg';
import tanvirul from '../assets/team/tanvirul-hoque.jpg';
import shahin from '../assets/team/shahin-kabir.jpg';
import fazley from '../assets/team/fazley-rabbi.jpg';
import allama from '../assets/team/allama-iqbal.jpg';

export interface Member {
  name: string;
  role: string;
  photo?: ImageMetadata;
}

export const founding: Member[] = [
  { name: 'Ekram Hossain', role: 'President', photo: ekram },
  { name: 'Tanvirul Hoque', role: 'Senior Vice President', photo: tanvirul },
  { name: 'MD Shahin Kabir', role: 'Secretary', photo: shahin },
  { name: 'MD Monir Hossain', role: 'Finance Secretary (Treasurer)' },
  { name: 'MD Fazley Rabbi', role: 'Organizing Secretary', photo: fazley },
  { name: 'Allama Iqbal', role: 'ICT Secretary', photo: allama },
  { name: 'Tirtha Sarathi Das', role: 'Social Welfare Secretary' },
];

export const executive: Member[] = [
  { name: 'Ananna Saha', role: 'Joint Cultural Secretary' },
  { name: 'Md Nasir Uddin', role: 'Joint Public Relations Secretary' },
  { name: 'Asif Mahmud', role: 'Joint Education Secretary' },
  { name: 'Nizamul Hoque Majumder', role: 'Joint ICT Secretary' },
  { name: 'Humayun Kabir', role: 'Public Relations Secretary' },
  { name: 'Tanvir Hossain', role: 'Joint Treasurer' },
  { name: 'Nabila Morshed', role: 'Joint Secretary' },
  { name: 'Md Nadim Hasan', role: 'Joint Organizing Secretary (Brussels)' },
  { name: 'Minhazul Islam', role: 'Joint Organizing Secretary (Leuven, Liège)' },
  { name: 'Tamim Ahmed Mahir', role: 'Joint Organizing Secretary (Mechelen)' },
  { name: 'Asshiq Hossain', role: 'Joint Social Welfare Secretary' },
  { name: 'Markajul Hasnain Alif', role: 'Joint Organizing Secretary (Ghent)' },
  { name: 'Tasfique Sarwar Joy', role: 'Joint Organizing Secretary (Antwerp)' },
  { name: 'Abir Hasan', role: 'Home Affairs Secretary' },
  { name: 'Md Shamim Ahmed', role: 'Sports Secretary' },
];

export function initials(name: string): string {
  const parts = name.replace(/^(md|mr|ms)\.?\s+/i, '').trim().split(/\s+/);
  const last = parts.length > 1 ? parts[parts.length - 1] : '';
  return (parts[0][0] + (last[0] ?? '')).toUpperCase();
}
