import { useState } from "react";
import { FaUser, FaBriefcase, FaCertificate, FaTools, FaSearch } from "react-icons/fa";
import { Sidebar, Menu, MenuItem } from "react-pro-sidebar";

const ProfilePage = () => {
  const user = {
    name: "John Doe",
    role: "Full Stack Developer",
    skills: ["React", "Laravel", "Bootstrap", "Tailwind"],
    image: "https://via.placeholder.com/150",
  };

  return (
    <div className="flex h-screen bg-gray-100">
      {/* Sidebar */}
      <Sidebar className="bg-white p-4 w-60 shadow-md">
        <h2 className="text-xl font-bold mb-4">Dashboard</h2>
        <Menu>
          <MenuItem icon={<FaUser />}>Show Proposals</MenuItem>
          <MenuItem icon={<FaBriefcase />}>Add Proposal</MenuItem>
          <MenuItem icon={<FaCertificate />}>Add Certificate</MenuItem>
          <MenuItem icon={<FaTools />}>Add Skills</MenuItem>
          <MenuItem icon={<FaSearch />}>Find Job</MenuItem>
        </Menu>
      </Sidebar>

      {/* Main Content */}
      <div className="flex-1 p-6">
        <div className="bg-white p-6 rounded-lg shadow-md">
          <div className="flex items-center space-x-6">
            <img src={user.image} alt="Profile" className="w-24 h-24 rounded-full" />
            <div>
              <h2 className="text-2xl font-bold">{user.name}</h2>
              <p className="text-gray-600">{user.role}</p>
              <div className="mt-2">
                <span className="font-semibold">Skills:</span>
                <div className="flex flex-wrap mt-1">
                  {user.skills.map((skill, index) => (
                    <span key={index} className="bg-blue-500 text-white px-2 py-1 text-sm rounded-lg m-1">
                      {skill}
                    </span>
                  ))}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default ProfilePage;
